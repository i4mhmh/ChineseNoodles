nums = [3,2,4]
target = 6
def summe(nums,target):
    demo = dict()
    for logo,num in enumerate(nums):
        des = target - num
        if des in demo:
            return(demo[des]) 
        else:
            demo[num] = logo
def main():
    print(summe(nums,target))
main()