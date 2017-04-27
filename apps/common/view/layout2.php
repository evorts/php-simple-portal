<?php
/**
 * author: steven
 * date: 4/25/17 4:27 PM
 */
if(isset($document) && $document instanceof \Portal\Common\Model\DocumentModel){
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title><?= $document->getHeader()->getTitle() ?></title>
        <meta name="robots" content="NOINDEX,NOFOLLOW">
        <!--suppress HtmlUnknownTarget -->
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/vnd.microsoft.icon">
        <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/global.css"/>
        <?php
        if(!empty($document->getHeader()->getStylesheets())){
            foreach ($document->getHeader()->getStylesheets() as $stylesheet){
                ?>
                <link rel="stylesheet" href="<?= $stylesheet ?>"/>
                <?php
            }
        }
        ?>
        <!--suppress JSUnresolvedLibraryURL -->
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <?php
        if(!empty($document->getHeader()->getScripts())){
            foreach ($document->getHeader()->getScripts() as $script){
                ?>
                <script type="text/javascript" src="<?= $script ?>"></script>
                <?php
            }
        }
        ?>
    </head>
    <body>
    <?= $document->getBody()->getContent() ?>
    <?php
    if(!empty($document->getBody()->getScripts())){
        foreach ($document->getBody()->getScripts() as $script){
            ?>
            <script type="text/javascript" src="<?= $script ?>"></script>
            <?php
        }
    }
    ?>
    </body>
    </html>
<?php
}
?>
