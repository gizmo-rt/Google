def answer(x, y):
    t1 = (x*(x+1)) >> 1
    t2 = x*(y-1)
    t3 = ((y-1)*(y-2)) >> 1
    result = t1+t2+t3
    return result


print(answer(5,10))
