<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use app\components\YoutubeWidget;

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