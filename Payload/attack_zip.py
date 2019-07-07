import zipfile
 
    
def main():
    filename = zipfile.ZipFile(r'C:\Users\全世界的面我都吃一遍\Desktop\1.zip')
    password = '888'
    filename.extractall(pwd=password.encode('utf-8'))
       
main()

