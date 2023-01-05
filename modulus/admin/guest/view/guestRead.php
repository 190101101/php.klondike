<?php $guest = $data->guest;?> 
<div class="page_head">
    <?php echo bread_cump(); ?>
</div>
<div class="table_content">
    <table class="table-media horizontal">
        <thead>
            <tr>
                <th>id</th>
                <th>last visit</th>
                <th>ip address</th>
                <th>country</th>
                <th>code</th>
                <th>city</th>
                <th>lat</th>
                <th>lon</th>
                <th>isp</th>
                <th>as</th>
                <th>query</th>
                <th>type</th>
                <th>mode</th>
                <th>created at</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td aria-label='id'># <?php echo $guest->guest_id; ?></td>
                <td aria-label='ip address'><?php echo $guest->guest_ip; ?></td>
                <td aria-label='last visit'><?php echo $guest->guest_last_visit; ?></td>
                <td aria-label='country'><?php echo $guest->guest_country; ?></td>
                <td aria-label='code'><?php echo $guest->guest_country_code; ?></td>
                <td aria-label='city'><?php echo $guest->guest_city; ?></td>
                <td aria-label='lat'><?php echo $guest->guest_lat; ?></td>
                <td aria-label='lon'><?php echo $guest->guest_lon; ?></td>
                <td aria-label='isp'><?php echo $guest->guest_isp; ?></td>
                <td aria-label='as'><?php echo $guest->guest_as; ?></td>
                <td aria-label='query'><?php echo $guest->guest_query; ?></td>
                <td aria-label='type'><?php echo $guest->guest_type; ?></td>
                <td aria-label='mode'><?php echo $guest->guest_mode; ?></td>
                <td aria-label='created at'><?php echo $guest->guest_created_at; ?></td>
            </tr>
        </tbody>
    </table>
</div>

