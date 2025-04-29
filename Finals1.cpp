#include <iostream>

using namespace std;

void finder(int numbers[], int size)
{
    cout << "Duplicate numbers: ";
    bool hasDuplicates = false;

    for (int i = 0; i < size; ++i)
    {
        for (int j = i + 1; j < size; ++j)
        {
            if (numbers[i] == numbers[j])
            {
                cout << numbers[i] << " ";
                hasDuplicates = true;
                break;
            }
        }
    }

    if (!hasDuplicates)
    {
        cout << "None";
    }
    cout << endl;
}

int main()
{
    const int SIZE = 15;
    int numbers[SIZE];

    while (true)
    {
        cout << "Enter 15 numbers: ";
        for (int i = 0; i < SIZE; ++i)
        {
            cin >> numbers[i];
        }

        finder(numbers, SIZE);

        char choice;
        cout << "Do you want to enter another set? (y/n): ";
        cin >> choice;
        if (choice != 'y' && choice != 'Y')
        {
            break;
        }
    }

    return 0;
}
