import urllib.request
import random
import time
mm = random.random()
nn = time.time()


def getHtml(url):
    page = urllib.request.urlopen(url)
    html = page.read()
    return html
html = getHtml("https://192.168.16.221/hp/device/DeviceStatus/Index")
#html = getHtml("http://www.qq.com")

print(html)
#
#req = urllib.request.Request('https://192.168.16.221/hp/device/DeviceStatus/Index')
#response = urllib.request.urlopen(req)
#the_page = response.read()
##print(the_page)
#
## 写文件
#with open(str(mm)+".html", "wt") as out_file:
#    out_file.write(response))
# 
##Read a file
#with open(str(mm)+".html", "rt") as in_file:
#   text = in_file.read()
#
# 
#print(text)
#
#
#