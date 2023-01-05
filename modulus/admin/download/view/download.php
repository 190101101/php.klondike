<div class="page_content">
    <div class="page_head">
        <?php echo bread_cump(); ?>
    </div>
    <div class="table_content">
        <table class="table-media">
            <thead>
                <tr>
                    <th>
                        <img src="<?php echo SVG1; ?>delete.svg">
                    </th>
                    <th>id</th>
                    <th>user id</th>
                    <th>login</th>
                    <th>user ip</th>
                    <th>ip address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data->download as $download): ?>
                <tr>
                    <td aria-label='delete'>
                        <a data-del="/panel/download/delete/<?php echo $download->download_id; ?>" class="this-del">
                            <img src="<?php echo SVG1; ?>delete.svg">
                        </a>
                    </td>
                    <td aria-label='id'>#<?php echo $download->download_id; ?></td>
                    <td aria-label='user id'>#<?php echo $download->user_id; ?></td>
                    <td aria-label='login'><?php echo $download->user_login; ?></td>
                    <td aria-label='user ip'><?php echo $download->user_ip; ?></td>
                    <td aria-label='ip address'><?php echo $download->ip_address; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       
        <!-- paginator -->
        <section id="paginator">
            <div class="paginator_box">
                <a href="/panel/download/page/1">НАЧАЛО</a>
                <?php \library\pagination::selector($data->page, 'panel/download/'); ?>
                <a href="/panel/download/page/<?php echo $data->page->length ? $data->page->length : 1; ?>">КОНЕЦ</a>
           </div>
        </section>
        <!-- paginator -->

    </div>
    
</div>

