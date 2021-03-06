<!DOCTYPE html>
<html>
    <head>
        <title>Online fortune generator</title>
        <meta charset="utf-8" />
        <meta name="description" content="Online fortune generator, compatible with UNIX fortune files" />
        <meta name="keywords" content="fortune, UNIX, random quotes, wasting time" />
        <style>
            body {
                padding-left: 1%;
                padding-right: 1%;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Welcome to Web-fortune, the online fortune generator !</h1>
        </header>
        <section>
        <section>
            <h2>Available fortune files</h2>
            <ul style="float: left;">
                <li><a href="fortune.php?html&amp;all"><b>All</b></a> <small><a href="fortune.php?all">[raw text]</a></small></li>
                <?php 
                $fortune_files = array();
                foreach(new DirectoryIterator('fortunes') as $file) {
                    if(!$file->isDot() && $file->isFile()) {
                        $fortune_files[] = (string) $file;
                        echo '';
                    }
                }
                
                sort($fortune_files);
                
                foreach($fortune_files as $index => $file): ?>
                    <li><a href="fortune.php?html&amp;file=<?php echo $file ?>"><?php echo $file ?></a> <small><a href="fortune.php?file=<?php echo $file ?>">[raw text]</a></small></li>
                    <?php if((($index + 1) % (count($fortune_files)/5) == 0)): // Splits fortunes in rows ?>
                         </ul>
                         <ul style="float: left; margin-top: 40px;">
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
            <br style="clear: both;" />
        </section>
            <h2>Why should you use this service ?</h2>
            <p>This service aims to be an emergency fallback for when the <code>fortune</code> UNIX program is unreachable and you are bored. For example :</p>
            <ul>
                <li>You are at work and your code is compiling (or not)</li>
                <li>You are using a friend's laptop running under Windope and you have too much time</li>
                <li>You lost your root password and you cannot install anything anymore</li>
            </ul>
            <p>Web-fortune can also be used to entertain visitors on your website :<p>
            <code>
                &lt;?php
                echo file_get_contents('http://wasting-ti.me/fortune/fortune.php?file=computers');
                ?&gt;
            </code>
        </section>
        <section>
            <h2>How to use Web-fortune ?</h2>
            <p>It's pretty simple.
            <br />
            Just go click on one of the many centers of interest above (e.g. <a href="http://wasting-ti.me/fortune/fortune.php?html&amp;computers">computers</a>)</p><p>For access from a terminal : </p>
            <code>curl http://wasting-ti.me/fortune/fortune.php?file=computers</code>
        </section>
        <section>
            <h2>Source code and license</h2>
            <p>This program is licensed under the <a href="LICENSE">Apache v2 License</a>. See <a href="https://github.com/316k/web-fortune">https://github.com/316k/web-fortune</a> for source code.</p>
        </section>
    </body>
</html>
