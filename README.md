# 思銳科技實名制登記網頁

## 初次登記

1. *index.html —* 此頁面是讓初次登記人員使用，需要填入個人基本資料，完成點選送出會使用 *scripts/main.js* 中的 *check1()* 檢查是否填寫正確，填寫錯誤提示錯誤位置，正確則會轉跳至 *PhpEmail/test.php。*
2. *PhpEmail/test.php —* 此頁面會呼叫 *PhpEmail/mail.php* 傳送驗證碼（共6碼）至先前填入的 email，按下驗證後會在 *PhpEmail/yanzhen.php* 中檢測驗證碼是否正確。在 *PhpEmail/test.php* 中的 form，會有 hidden 形式的 input，是用來暫存表單的值，以傳送至*PhpEmail/yanzhen.php*。
3. *PhpEmail/yanzhen.php —* 若驗證碼錯誤，提示驗證碼有誤，並回至 *PhpEmail/test.php*。若驗證碼正確，將表單內容 insert 至 MySQL 資料庫中，完成後轉跳至 *success.html*，初次登記流程結束。

## 資料更新

1. MySQL 資料表 important_info 中的資料 qr_code 是一張 QR code，其為ㄧ url （後方有網址變數id），連至此使用者專屬更新頁面，使用者可以透過此頁面更新自己的旅遊史、相關症狀及接觸史。
2. *update_page.php* — 此頁面會先抓取指定id（網址變數）的資料，並將使用者前一次更新的資料設為預設。其中有一hidden **形式的 input，用來存取 id。點選送出後毀使用 *scripts/main.js* 中的 *check2()* 檢查是否填寫正確，填寫錯誤提示錯誤位置，正確則會轉跳至 *update.php*。
3. *update.php —*  更新特定 id 之資料至資料庫，完成後轉跳制 *success.html*，資料更新流程結束。

## 測試

1. 資料夾 *testing* 中有兩個 python 檔，為測試初次登記與資料更新頁面之程式，在測試之前必須先更改 *index.html #16* 位置：

    將以下

    ```html
    <form name=data method = "POST" action="PhpEmail/test.php" accept-charset="utf-8">
    ```

    改為

    ```html
    <form name=data method = "POST" action="PhpEmail/no_email.php" accept-charset="utf-8">
    ```

    此用意是跳過email驗證步驟。此兩 python 檔須先安裝 Selenium ，可參考 [https://brettlin-78528.medium.com/用-python-匯入-selenium-的方式-以及如何用mac-安裝-chromedriver-5d92121c02d7](https://brettlin-78528.medium.com/%E7%94%A8-python-%E5%8C%AF%E5%85%A5-selenium-%E7%9A%84%E6%96%B9%E5%BC%8F-%E4%BB%A5%E5%8F%8A%E5%A6%82%E4%BD%95%E7%94%A8mac-%E5%AE%89%E8%A3%9D-chromedriver-5d92121c02d7) 。

2. *testing/web_test.php —* 測試初次登記頁面使用，更改 #32 之 for 迴圈可設置總共執行幾次。
3. *testing/update_test.php —* 測試資料更新頁面使用，更改 #32 之 for 迴圈可設置總共執行幾次，其中 for 迴圈的變數 i 為 更新資料之 id（第 i 次更新 id = i 之資料）。
4. *success.html* 與 *update_page.php* 中 input 的 id 值為測試所需，方便 python 抓取需填寫之位置。
