from colorama import init, Fore

init()


def is_valid_brackets(sequence):
    stack = []

    for element in sequence:
        if element == '(':
            stack.append(element)
        elif element == ')':
            if len(stack) == 0:
                return False
            stack.pop()

    return len(stack) == 0


if __name__ == '__main__':
    bracket_sequence = input("Введите скобочную последовательность: ")
    if is_valid_brackets(bracket_sequence):
        print(Fore.GREEN + "Правильная последовательность")
    else:
        print(Fore.RED + "Неправильная последовательность")
