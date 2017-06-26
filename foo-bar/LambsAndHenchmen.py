def answer(total_lambs):
    fib_i = 1
    fib_j = 1
    fib_count = 2
    fib_lambs = 2
    incr_lambs = 1
    incr_count = 1
    incr_temp = 1

    if (total_lambs in [0, 1, 2]):
        return 0

    while ((fib_lambs + fib_i + fib_j) <= total_lambs):
        temp = fib_i + fib_j
        fib_i = fib_j
        fib_j = temp
        fib_lambs += temp
        fib_count += 1

    while ((incr_lambs + (incr_temp * 2)) <= total_lambs):
        incr_temp *= 2
        incr_lambs += incr_temp
        incr_count += 1

    if ((incr_lambs + int(incr_temp *1.5)) <= total_lambs):
        incr_prev = incr_lambs / 2;
        incr_next = incr_lambs + incr_temp+1
        if (incr_next+incr_lambs <= total_lambs):
            incr_count += 1

    return fib_count - incr_count


print(answer(10))

