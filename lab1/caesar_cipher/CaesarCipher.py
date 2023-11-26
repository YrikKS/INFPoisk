from string import ascii_uppercase, ascii_lowercase


def caesar_cipher(input_file_name, output_file_name, shift, language):
    alphabet = []
    if language in ["english", "e", "а"]:
        alphabet = ascii_uppercase + ascii_lowercase
    elif language in ["russian", "r", "р"]:
        alphabet = 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ' + 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя'
    else:
        print("Неподдерживаемый язык")
        return

    input_file = open(input_file_name, 'r')
    output_file = open(output_file_name, 'w')

    while True:
        char = input_file.read(1)
        if char == '':
            break

        if char in alphabet:
            index = (alphabet.index(char) + shift) % len(alphabet)
            output_file.write(alphabet[index])
        else:
            output_file.write(char)

    input_file.close()
    output_file.close()


if __name__ == '__main__':
    input_file = input("Введите путь до исходного файла: ")
    output_file = input("Введите путь для сохранения нового текста: ")
    shift = int(input("Введите сдвиг: "))
    language = input("Введите язык текста english (e/а) или русский (r/р): ")

    caesar_cipher(input_file, output_file, shift, language)
