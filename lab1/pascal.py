def print_pascal_triangle(n):
    if not isinstance(n, int):
        raise ValueError("Вы ввели не число")

    if n <= 0:
        raise ValueError("Введите целое положительное число.")

    triangle = []
    for i in range(n):
        row = [1] * (i + 1)
        if i > 1:
            for j in range(1, i):
                row[j] = triangle[i - 1][j - 1] + triangle[i - 1][j]
        triangle.append(row)

    max_size = len(to_str(triangle[-1]))
    for row in triangle:
        print(f"{to_str(row):^{max_size}}\n", sep=" ", end="")


def to_str(self):
    return ' '.join(map(str, self))


if __name__ == '__main__':
    n = input("Введите число n: ")
    try:
        print_pascal_triangle(int(n))
    except ValueError as err:
        print("Неправильный ввод")
        print(err.args)
