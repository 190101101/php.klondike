<?php 
    $article_id = $data->article_id; 

    if($data->comment != FALSE){
        $last_comment_id = $data->comment[count($data->comment)-1]->comment_id; 
    }
?>

<div class="page_head">
    <?php echo bread_cump(); ?>
</div>

<form data-action="/panel/comment/create" class="general_form data_form">
    <div class="form_box">
        <input type="text" name="comment_text" placeholder="send comment">
        <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
    </div>
</form>

<div class="table_content">
    <table class="table-media comment-table">
        <thead>
            <tr>
                <th>id</th>
                <th>user</th>
                <th>comment</th>
                <th>
                    <img src="<?php echo SVG1; ?>delete.svg">
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data->comment as $comment): ?>
            <tr>
                <td aria-label='id'># <?php echo $comment->comment_id; ?></td>
                <td aria-label='user'><?php echo $comment->user_login; ?></td>
                <td aria-label='comment'>
                    <div>
                        <?php echo $comment->comment_text; ?>
                    </div>

                   <span>
                        <a data-get="/panel/comment/rating/like/<?php echo $comment->comment_id; ?>" class="data-get">
                            <img src="<?php echo SVG1; ?>like.svg">
                            <span><?php echo $comment->comment_like; ?></span>
                        </a>
                    </span>

                    <span>
                        <a data-get="/panel/comment/rating/dislike/<?php echo $comment->comment_id; ?>" class="data-get">
                            <img src="<?php echo SVG1; ?>dislike.svg">
                            <span><?php echo $comment->comment_dislike; ?></span>
                        </a>
                    </span>
                </td>
                <td aria-label='delete'>
                    <a data-del="/panel/comment/delete/<?php echo $comment->comment_id; ?>" 
                        class="this-del">
                        <img src="<?php echo SVG1; ?>delete.svg">
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>

    <?php if(count($data->comment) > 6): ?>
    <div class="load_more_box" style="width: 100%; padding-bottom: 30px;">
        <button 
            data-get="/panel/comment/load/more/<?php echo $article_id ?>/<?php echo $last_comment_id; ?>"
            style="width: 100%;" class="data-get load_more">load more</button>
    </div>
    <?php endif; ?>
</div>
