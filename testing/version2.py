from selenium import webdriver
import threading
import random
import time
import string
threadLocal = threading.local()
def get_driver():
    driver = getattr(threadLocal, 'driver', None)
    if driver is None:
        chromeOptions = webdriver.ChromeOptions()
        #chromeOptions.add_argument("--headless")
        chromeOptions.add_argument("--incognito") #開啟無痕模式
        driver = webdriver.Chrome(chrome_options=chromeOptions, executable_path='/usr/local/bin/chromedriver')
        setattr(threadLocal, 'driver', driver)
    return driver
def date_r():
    a1=(2000,1,1,0,0,0,0,0,0)       #設定開始日期時間元組（2000-01-01 00：00：00）
    a2=(2021,4,22,23,59,59,0,0,0)  #設定結束日期時間元組（2021-4-22 23：59：59）
    start=time.mktime(a1)  #生成開始時間戳
    end=time.mktime(a2)   #生成結束時間戳
    t=random.randint(start,end)  #在開始和結束時間戳中隨機取出一個
    date_touple=time.localtime(t)     #將時間戳生成時間元組
    date=time.strftime("00%Y-%m-%d",date_touple) #將時間元組轉成格式化字串（2021-05-21）
    return date
def string_r():   #隨機字串
    return "".join(random.sample(['思','私','電','j','u','我','好','棒','4','I','9','Q','8','J','誒',']','['], 5)).replace(" " ," ")
def phone_r():    #隨機手機
    return "09"+"".join(random.sample(['1','2','3','4','5','6','7','8','9', '0'], 8)).replace(" " ," ")
def email_r():    #隨機email
    return "".join(random.sample(['1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g'], 8)).replace(" " ," ")+'@gmail.com'
def select(driver,x,y):  #選擇id為x,value為y
    a = str(x)+'_'+str(y)
    driver.find_element_by_id(a).click()
def select_r(driver,x,y): #選擇id為x,value為0~y其中一個
    num = random.randint(0, y)
    a = str(x)+'_'+str(num)
    driver.find_element_by_id(a).click()
def mulity_select(driver,x,y,z): #選擇id為x,value為0~y其中z個
    num = random.sample(range(1, y), z)
    for i in range(z):
        a  = str(x)+'_'+str(num[i])
        driver.find_element_by_id(a).click()
def job(i):
    driver = get_driver()
    driver.get('http://testform.estinet.com:8081/') #問卷url
    elem = driver.find_element_by_name("name")
    elem.send_keys(i+1)
    elem = driver.find_element_by_name("phone")
    elem.send_keys(phone_r())
    elem = driver.find_element_by_name("email")
    elem.send_keys(email_r())
    elem = driver.find_element_by_name("department")
    elem.send_keys(string_r())
    elem = driver.find_element_by_name("reception")
    elem.send_keys(string_r())
    elem = driver.find_element_by_name("contact_person")
    elem.send_keys(string_r())
    select(driver,'a',1)
    elem = driver.find_element_by_name("entry_date")
    elem.send_keys(date_r())
    elem = driver.find_element_by_name("source")
    elem.send_keys(string_r())
    elem = driver.find_element_by_name("flight")
    elem.send_keys(string_r())
    mulity_select(driver,'s',7,4)
    driver.find_element_by_id('s_8').click()
    elem = driver.find_element_by_name("other")
    elem.send_keys(string_r())
    select(driver,'cq1',1)
    select(driver,'relation',0)
    elem = driver.find_element_by_name("abroad_person")
    elem.send_keys(string_r())
    elem = driver.find_element_by_name("c_entry_date")
    elem.send_keys(date_r())
    select_r(driver,'manage',4)
    elem = driver.find_element_by_name("manage_start")
    elem.send_keys(date_r())
    elem = driver.find_element_by_name("manage_end")
    elem.send_keys(date_r())
    elem = driver.find_element_by_name("abroad_ill")
    elem.send_keys(string_r())
    select_r(driver,'cq2',1)
    select_r(driver,'cq3',1)
    select_r(driver,'cq4',1)
    driver.find_element_by_xpath("//input[@type='button']").click()
    print('第'+str(i+1)+'次填寫成功')
    driver.close()

threads = []
for i in range(20):
  threads.append(threading.Thread(target = job, args = (i,)))
  threads[i].start()

for i in range(20):
  threads[i].join()
print("Done.")
