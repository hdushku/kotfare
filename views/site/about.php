<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use app\components\YoutubeWidget;
use lo\widgets\SlimScroll;
use wadeshuler\sliderrevolution\SliderRevolution;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>

<?php
$config = ['delay' => 9000, 'startwidth' => 1170, 'startheight' => 500, 'hideThumbs' => 10, 'fullWidth' => '"on"', 'forceFullWidth' => '"on"'];
$container = ['class' => 'tp-banner-container'];
$wrapper = ['class' => 'tp-banner'];
$ulOptions = ['class' => 'my-ul'];

$slides = [
    [
        'options' => ['data' => ['transition' => 'fade', 'slotamount' => '2', 'masterspeed' => '1500']],
        'image' => ['src' => Yii::getAlias('@files/n1.jpg'), 'options' => ['alt' => 'slidebg1', 'data' => ['bgfit' => 'cover', 'bgposition' => 'left center', 'bgrepeat' => 'no-repeat']]],
        'layers' => [
            [
                'options' => ['class' => 'tp-caption lft', 'data' => ['x' => 'center', 'y' => 'top', 'hoffset' => '0', 'voffset' => '50', 'speed' => '2500', 'start' => '1200', 'easing' => 'Power4.easeOut', 'endspeed' => '300', 'endeasing' => 'Power1.easeIn', 'captionhidden' => 'off'], 'style' => 'z-index: 6'],
                'content' => 'My Slide'
            ],
            [
                'options' => ['class' => 'tp-caption lfr', 'data' => ['x' => 'center', 'y' => 'bottom', 'hoffset' => '0', 'voffset' => '-50', 'speed' => '2500', 'start' => '1800', 'easing' => 'Power4.easeOut', 'endspeed' => '300', 'endeasing' => 'Power1.easeIn', 'captionhidden' => 'off'], 'style' => 'z-index: 6'],
                'content' => 'My Text'
            ],
        ],
    ]
];

echo SliderRevolution::widget([
    'config' => $config,
    'container' => $container,
    'wrapper' => $wrapper,
    'ulOptions' => $ulOptions,
    'slides' => $slides
]);
?>


<?php
echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'heading' => 'Options',
    'items' => [
        [
            'url' => '#',
            'label' => 'Home',
            'icon' => 'home'
        ],
        [
            'label' => 'Help',
            'icon' => 'question-sign',
            'items' => [
                ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
            ],
        ],
    ],
]);
?>

<?=\imanilchaudhari\rrssb\ShareBar::widget([
        'title' => 'Title Content', // i.e. $model->title
        'media' => 'image.jpg', // Media Content
        'networks' => [
            'Email',
            'Facebook',
            'Github',
            'GooglePlus',
            'Hackernews',
            'LinkedIn',
            'Pinterest',
            'Pocket',
            'Reddit',
            'Tumblr',
            'Twitter',
            'Vk',
            'Youtube'  
        ]
    ]); 
?>

<div class="uploader"></div>
<?= harrytang\fineuploader\Fineuploader::widget([
        'options' => [
            'request' => [
                'endpoint' => Yii::$app->urlManager->createUrl(['/your-handler']),
                'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
            ],
            'validation' => [
                'allowedExtensions' => ['jpeg', 'jpg', 'png', 'bmp', 'gif'],
            ],
            'classes' => [
                'success' => 'alert alert-success hidden',
                'fail' => 'alert alert-error'
            ],
            //'multiple'=>false,
        ],
        //'events' => [
        //    'allComplete' => '$("#loading").modal("hide"); ',
        //]
    ])
?>

<?= YoutubeWidget::widget([
    "code"=>"KzTOAVGVymU",
    "w"=>"600px",
    "h"=>"450px",
    ]) ?>

<?= SlimScroll::widget([
    'options'=>[
        'height'=>'250px'
    ]
]); 
?>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat. Aenean ultricies ultrices mauris ac congue
</p>
<?= SlimScroll::end(); ?>

<?php 
    $fotorama = \metalguardian\fotorama\Fotorama::begin(
        [
            'options' => [
                'loop' => true,
                'hash' => true,
                'ratio' => 400/250,
            ],
            'spinner' => [
                'lines' => 20,
            ],
            'tagName' => 'span',
            'useHtmlData' => false,
            'htmlOptions' => [
                'class' => 'custom-class',
                'id' => 'custom-id',
            ],
        ]
    ); 
    ?>
        <img src="http://s.fotorama.io/1.jpg">    
        <img src="http://s.fotorama.io/2.jpg">
        <img src="http://s.fotorama.io/3.jpg">
        <img src="http://s.fotorama.io/4.jpg">
        <img src="http://s.fotorama.io/5.jpg">
    <?php $fotorama->end(); ?>

        
<?php 
    echo \metalguardian\fotorama\Fotorama::widget(
        [
            'items' => [
                ['img' => 'http://s.fotorama.io/1.jpg', 'id' => 'id-one',],
                ['img' => 'http://s.fotorama.io/2.jpg',],
                ['img' => 'http://s.fotorama.io/3.jpg',],
                ['img' => 'http://s.fotorama.io/4.jpg',],
                ['video' => 'http://youtube.com/watch?v=C3lWwBslWqg',],
            ],
            'options' => [
                'nav' => 'thumbs',
                'ratio' => 300/200,
            ]
        ]
    ); 
    ?>