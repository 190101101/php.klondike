<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60e6771dd1d81c5ef375f5b620900a6e
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'modulus\\' => 8,
            'middleware\\' => 11,
        ),
        'l' => 
        array (
            'library\\' => 8,
        ),
        'c' => 
        array (
            'core\\' => 5,
        ),
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
        'P' => 
        array (
            'Pattern\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'modulus\\' => 
        array (
            0 => __DIR__ . '/../..' . '/modulus',
        ),
        'middleware\\' => 
        array (
            0 => __DIR__ . '/../..' . '/middleware',
        ),
        'library\\' => 
        array (
            0 => __DIR__ . '/../..' . '/library',
        ),
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
        'Pattern\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Pattern',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Pattern\\Creational\\Singleton' => __DIR__ . '/../..' . '/Pattern/Creational/Singleton.php',
        'core\\app' => __DIR__ . '/../..' . '/core/app.php',
        'core\\controller' => __DIR__ . '/../..' . '/core/controller.php',
        'core\\model' => __DIR__ . '/../..' . '/core/model.php',
        'core\\view' => __DIR__ . '/../..' . '/core/view.php',
        'library\\File' => __DIR__ . '/../..' . '/library/File.php',
        'library\\User' => __DIR__ . '/../..' . '/library/User.php',
        'library\\code' => __DIR__ . '/../..' . '/library/code.php',
        'library\\config' => __DIR__ . '/../..' . '/library/config.php',
        'library\\cookie' => __DIR__ . '/../..' . '/library/cookie.php',
        'library\\cookies' => __DIR__ . '/../..' . '/library/cookies.php',
        'library\\error' => __DIR__ . '/../..' . '/library/error.php',
        'library\\guest' => __DIR__ . '/../..' . '/library/guest.php',
        'library\\http' => __DIR__ . '/../..' . '/library/http.php',
        'library\\mailer' => __DIR__ . '/../..' . '/library/mailer.php',
        'library\\message' => __DIR__ . '/../..' . '/library/message.php',
        'library\\middleware' => __DIR__ . '/../..' . '/library/middleware.php',
        'library\\pagination' => __DIR__ . '/../..' . '/library/pagination.php',
        'library\\session' => __DIR__ . '/../..' . '/library/session.php',
        'library\\triangle' => __DIR__ . '/../..' . '/library/triangle.php',
        'middleware\\Auth' => __DIR__ . '/../..' . '/middleware/Auth.php',
        'middleware\\ifLogin' => __DIR__ . '/../..' . '/middleware/ifLogin.php',
        'middleware\\ifNotlogin' => __DIR__ . '/../..' . '/middleware/ifNotlogin.php',
        'middleware\\isAdmin' => __DIR__ . '/../..' . '/middleware/isAdmin.php',
        'middleware\\panel' => __DIR__ . '/../..' . '/middleware/panel.php',
        'modulus\\admin\\ad\\controller\\adController' => __DIR__ . '/../..' . '/modulus/admin/ad/controller/adController.php',
        'modulus\\admin\\ad\\model\\adModel' => __DIR__ . '/../..' . '/modulus/admin/ad/model/adModel.php',
        'modulus\\admin\\article\\controller\\articleController' => __DIR__ . '/../..' . '/modulus/admin/article/controller/articleController.php',
        'modulus\\admin\\article\\model\\articleModel' => __DIR__ . '/../..' . '/modulus/admin/article/model/articleModel.php',
        'modulus\\admin\\category\\controller\\categoryController' => __DIR__ . '/../..' . '/modulus/admin/category/controller/categoryController.php',
        'modulus\\admin\\category\\model\\categoryModel' => __DIR__ . '/../..' . '/modulus/admin/category/model/categoryModel.php',
        'modulus\\admin\\chat\\controller\\chatController' => __DIR__ . '/../..' . '/modulus/admin/chat/controller/chatController.php',
        'modulus\\admin\\chat\\model\\chatModel' => __DIR__ . '/../..' . '/modulus/admin/chat/model/chatModel.php',
        'modulus\\admin\\comment\\controller\\commentController' => __DIR__ . '/../..' . '/modulus/admin/comment/controller/commentController.php',
        'modulus\\admin\\comment\\model\\commentModel' => __DIR__ . '/../..' . '/modulus/admin/comment/model/commentModel.php',
        'modulus\\admin\\guest\\controller\\guestController' => __DIR__ . '/../..' . '/modulus/admin/guest/controller/guestController.php',
        'modulus\\admin\\guest\\model\\guestModel' => __DIR__ . '/../..' . '/modulus/admin/guest/model/guestModel.php',
        'modulus\\admin\\image\\controller\\imageController' => __DIR__ . '/../..' . '/modulus/admin/image/controller/imageController.php',
        'modulus\\admin\\image\\model\\imageModel' => __DIR__ . '/../..' . '/modulus/admin/image/model/imageModel.php',
        'modulus\\admin\\notice\\controller\\noticeController' => __DIR__ . '/../..' . '/modulus/admin/notice/controller/noticeController.php',
        'modulus\\admin\\notice\\model\\noticeModel' => __DIR__ . '/../..' . '/modulus/admin/notice/model/noticeModel.php',
        'modulus\\admin\\panel\\controller\\panelController' => __DIR__ . '/../..' . '/modulus/admin/panel/controller/panelController.php',
        'modulus\\admin\\panel\\model\\panelModel' => __DIR__ . '/../..' . '/modulus/admin/panel/model/panelModel.php',
        'modulus\\admin\\post\\controller\\postController' => __DIR__ . '/../..' . '/modulus/admin/post/controller/postController.php',
        'modulus\\admin\\post\\model\\postModel' => __DIR__ . '/../..' . '/modulus/admin/post/model/postModel.php',
        'modulus\\admin\\requires\\controller\\requireController' => __DIR__ . '/../..' . '/modulus/admin/requires/controller/requireController.php',
        'modulus\\admin\\requires\\model\\requireModel' => __DIR__ . '/../..' . '/modulus/admin/requires/model/requireModel.php',
        'modulus\\admin\\section\\controller\\sectionController' => __DIR__ . '/../..' . '/modulus/admin/section/controller/sectionController.php',
        'modulus\\admin\\section\\model\\sectionModel' => __DIR__ . '/../..' . '/modulus/admin/section/model/sectionModel.php',
        'modulus\\admin\\user\\controller\\userController' => __DIR__ . '/../..' . '/modulus/admin/user/controller/userController.php',
        'modulus\\admin\\user\\model\\userModel' => __DIR__ . '/../..' . '/modulus/admin/user/model/userModel.php',
        'modulus\\admin\\voting\\controller\\votingController' => __DIR__ . '/../..' . '/modulus/admin/voting/controller/votingController.php',
        'modulus\\admin\\voting\\model\\votingModel' => __DIR__ . '/../..' . '/modulus/admin/voting/model/votingModel.php',
        'modulus\\main\\about\\controller\\aboutController' => __DIR__ . '/../..' . '/modulus/main/about/controller/aboutController.php',
        'modulus\\main\\about\\model\\aboutModel' => __DIR__ . '/../..' . '/modulus/main/about/model/aboutModel.php',
        'modulus\\main\\article\\controller\\articleController' => __DIR__ . '/../..' . '/modulus/main/article/controller/articleController.php',
        'modulus\\main\\article\\model\\articleModel' => __DIR__ . '/../..' . '/modulus/main/article/model/articleModel.php',
        'modulus\\main\\auth\\controller\\authController' => __DIR__ . '/../..' . '/modulus/main/auth/controller/authController.php',
        'modulus\\main\\auth\\model\\authModel' => __DIR__ . '/../..' . '/modulus/main/auth/model/authModel.php',
        'modulus\\main\\category\\controller\\categoryController' => __DIR__ . '/../..' . '/modulus/main/category/controller/categoryController.php',
        'modulus\\main\\category\\model\\categoryModel' => __DIR__ . '/../..' . '/modulus/main/category/model/categoryModel.php',
        'modulus\\main\\chat\\controller\\chatController' => __DIR__ . '/../..' . '/modulus/main/chat/controller/chatController.php',
        'modulus\\main\\chat\\model\\chatModel' => __DIR__ . '/../..' . '/modulus/main/chat/model/chatModel.php',
        'modulus\\main\\comment\\controller\\commentController' => __DIR__ . '/../..' . '/modulus/main/comment/controller/commentController.php',
        'modulus\\main\\comment\\model\\commentModel' => __DIR__ . '/../..' . '/modulus/main/comment/model/commentModel.php',
        'modulus\\main\\error\\controller\\errorController' => __DIR__ . '/../..' . '/modulus/main/error/controller/errorController.php',
        'modulus\\main\\error\\model\\errorModel' => __DIR__ . '/../..' . '/modulus/main/error/model/errorModel.php',
        'modulus\\main\\home\\controller\\homeController' => __DIR__ . '/../..' . '/modulus/main/home/controller/homeController.php',
        'modulus\\main\\home\\model\\homeModel' => __DIR__ . '/../..' . '/modulus/main/home/model/homeModel.php',
        'modulus\\main\\reply\\controller\\replyController' => __DIR__ . '/../..' . '/modulus/main/reply/controller/replyController.php',
        'modulus\\main\\reply\\model\\replyModel' => __DIR__ . '/../..' . '/modulus/main/reply/model/replyModel.php',
        'modulus\\main\\requires\\controller\\requireController' => __DIR__ . '/../..' . '/modulus/main/requires/controller/requireController.php',
        'modulus\\main\\requires\\model\\requireModel' => __DIR__ . '/../..' . '/modulus/main/requires/model/requireModel.php',
        'modulus\\main\\search\\controller\\searchController' => __DIR__ . '/../..' . '/modulus/main/search/controller/searchController.php',
        'modulus\\main\\search\\model\\searchModel' => __DIR__ . '/../..' . '/modulus/main/search/model/searchModel.php',
        'modulus\\main\\voting\\controller\\votingController' => __DIR__ . '/../..' . '/modulus/main/voting/controller/votingController.php',
        'modulus\\main\\voting\\model\\votingModel' => __DIR__ . '/../..' . '/modulus/main/voting/model/votingModel.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60e6771dd1d81c5ef375f5b620900a6e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60e6771dd1d81c5ef375f5b620900a6e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit60e6771dd1d81c5ef375f5b620900a6e::$classMap;

        }, null, ClassLoader::class);
    }
}