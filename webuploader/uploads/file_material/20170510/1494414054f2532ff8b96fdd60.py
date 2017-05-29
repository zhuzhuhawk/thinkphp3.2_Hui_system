# Filename : test.py
# author by : www.runoob.com

import random
import time
mm = random.random()
nn = time.time()

# 写文件
with open(str(mm)+".php", "wt") as out_file:
    out_file.write("抓取文件生成到这里\n看到我了吧！")
 
#Read a file
with open(str(mm)+".php", "rt") as in_file:
   text = in_file.read()

 
print(text)

import calendar

cal = calendar.month(2017, 4)
print ("以下输出2016年1月份的日历:")
print (cal)