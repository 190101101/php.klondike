<?php 
    
    $article_id = $data->article_id; 

    if($data->image != FALSE)
    {
        $last_image_id = $data->image[count($data->image)-1]->image_id; 
    }

?>


<div class="page_head">
    <?php echo bread_cump(); ?>
</div>

<!-- <form action="/panel/image/create" method="POST" class="general_form" enctype="multipart/form-data"> -->
<!-- <form data-action="/panel/image/create" class="general_form load_create_form"> -->
<form data-action="/panel/image/create" class="general_form data_form">
    <div class="form_box">
        <input type="file" name="image_image[]" multiple id="uploadimage" onchange="imageupload()">
    </div>

    <div class="form_box">
        <progress class="tagprogress" id="progressBar" value="0" max="100"></progress>
        <span id="uploadstatus">отчет загруженных файлов</span>
    </div>

    <div class="form_box">
        <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
        <button>create</button>
    </div>
</form>

<div class="table_content">
    <table class="table-media image-table">
        <thead>
            <tr>
                <th>id</th>
                <th>article</th>
                <th>name</th>
                <th>image</th>
                <th>
                    <img src="<?php echo SVG1; ?>delete.svg">
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data->image as $image): ?>
            <tr>
                <td aria-label='id'># <?php echo $image->image_id; ?></td>
                <td aria-label='article'><?php echo $image->article_id; ?></td>
                <td aria-label='name'><?php echo $image->image_image; ?></td>
                <td aria-label='image'>
                    <img src="<?php echo IMAGES ?><?php echo $image->image_image; ?>">
                </td>
                <td aria-label='delete'>
                    <a data-del="/panel/image/delete/<?php echo $image->image_id; ?>" class="this-del">
                        <img src="<?php echo SVG1; ?>delete.svg">
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if(count($data->image) > 4): ?>
    <div class="load_more_box" style="width: 100%; padding-bottom: 30px;">
        <button 
            data-get="/panel/image/load/more/<?php echo $article_id ?>/<?php echo $last_image_id; ?>"
            style="width: 100%;" class="data-get load_more">load more</button>
    </div>
    <?php endif; ?>
</div>
