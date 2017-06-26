# 00,01,10 bitmask
#15 --> 5
# 5 --> 2

def answer(n):
    count = 0
    n = int(n)

    while n > 1:
        if n % 2 == 0:
            n >>= 1
        elif n == 3 or n % 4 == 1:
            n = n - 1
        else:
            n = n + 1
        count = count + 1
    return count


print(answer(4))

