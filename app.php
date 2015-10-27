<?php
    // your_application_name bluemixで作成したアプリケーション名を入力してください。
    $app2url = "http://your_application_name.mybluemix.net/callcenter";
    
    // +81xxxxxxxxxxには、「あなたの携帯番号」を入力してください。
    // your nameには、「あなたのお名前」を入力してください。
    $people = array(
                    "+81xxxxxxxxxx"=>"your name"
                    );
    
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>

<Response>
<?php if(!$name = $people[$_REQUEST['From']]) { ?>
    <Say language="ja-jp" voice="woman">お電話ありがとうございます。こちらはトゥイリオシステムです。発信音の後にご用件をお話しいただき、しばしそのままでお待ち下さい。</Say>
    <Record action="<?php echo $app2url ?>" method="POST" maxLength="60" />
    <Say language="ja-jp" voice="woman">申し訳ありません。もう一度お掛け直しください</Say>
<?php } else { ?>
    <Say language="ja-jp" voice="woman"><?php echo $name ?>さんこんにちは。どうなさいましたか。</Say>
    <Record action="<?php echo $app2url ?>" method="POST" maxLength="60" />
    <Say language="ja-jp" voice="woman"><?php echo $name ?>さん申し訳ありません。もう一度お掛け直しください</Say>
<?php } ?>
</Response>



