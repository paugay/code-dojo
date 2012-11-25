function Bank()
{
    this.parse = function(input)
    {
        var rowArray = input.split("\n"),
            index = 0,
            code = "",
            character = 0;

        rowArray.pop();

        while (index < 9)
        {
            character = parseCharacter(
                getNumberFromArray(index, rowArray)
            );

            if (character === undefined)
            {
                return NaN;
            }
            else
            {
                code += character;
            }

            index++;
        }
        
        return parseInt(code);
    }

    function parseCharacter(character)
    {
        var hash = {
            "     |  |   " : 1,
            " _  _||_    " : 2,
            " _  _| _|   " : 3,
            "   |_|  |   " : 4,
            " _ |_  _|   " : 5,
            " _ |_ |_|   " : 6,
            " _   |  |   " : 7,
            " _ |_||_|   " : 8,
            " _ |_| _|   " : 9,
            " _ | ||_|   " : 0
        };

        return hash[character];
    }

    function getNumberFromArray(i, rowArray)
    {
        index = i * 3;

        return rowArray[0].substring(index, index + 3)
            + rowArray[1].substring(index, index + 3)
            + rowArray[2].substring(index, index + 3)
            + rowArray[3].substring(index, index + 3);
    }
}
