<?php 

namespace modulus\admin\setting\model;
use core\model;
use \library\error;
use \library\message;
use \Valitron\Validator as v;

class settingModel extends model
{
	public function settingCount()
    {
        return count($this->db->sql("
            
            SELECT setting_id FROM setting 
            
            ORDER BY setting.setting_id DESC", 2));
    }

    public function setting($start, $limit)
    {
        return $this->db->t1where('setting', "setting_id > 0  ORDER BY setting_id DESC LIMIT {$start}, {$limit}", [], 2, 2);
    }

    public function _settingUpdate($id)
    {
        $setting =  $this->db->t1where('setting', 'setting.setting_id=?', [$id]);
        return $setting ? $setting : redirect('panel/setting');
    }

    public function __settingUpdate()
    {
        $data = peel_tag_array($_POST);

        $v = new v($data);

        $v->rule('required', [
            'setting_description',
            'setting_key',
            'setting_value',
            'setting_id',
        ]);

        error::jsonvalitron($v);

        $setting = $this->db->t1where('setting', 'setting_key=? && setting_id != ?', [
            $data['setting_key'], $data['setting_id']
        ]);

        if($setting)
        {
            (new message)->code(300)->return('already_have')->json();
        }

        $data += ['setting_updated_at' => date('Y-m-d H:i:s')];

        $return = $this->db->update('setting', $data, [
            'id' => 'setting_id',
        ]);

        $setting = $this->db->t1where('setting', 'setting_id=?', [
            $data['setting_id']
        ]);

        if($return['status'] == TRUE)
        {
            (new message)->code(200)->return('success')->data([
                'setting' => $setting,
                'render' => 'setting_update'
            ])->json();

        }else
        {
            (new message)->code(404)->return('error')->json();
        }
    }


}
