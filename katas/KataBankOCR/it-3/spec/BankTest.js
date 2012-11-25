describe("Bank", function() {

    var input = 
        "                           \n"
      + "  |  |  |  |  |  |  |  |  |\n"
      + "  |  |  |  |  |  |  |  |  |\n"
      + "                           \n";

    var input2 = 
        " _  _  _  _  _  _  _  _  _ \n"
      + " _| _| _| _| _| _| _| _| _|\n"
      + "|_ |_ |_ |_ |_ |_ |_ |_ |_ \n"
      + "                           \n";

    var input3 = 
        "    _  _     _  _  _  _  _ \n"
      + "  | _| _||_||_ |_   ||_||_|\n"
      + "  ||_  _|  | _||_|  ||_| _|\n"
      + "                           \n";

    var input4 = 
        "    _  _     _  _  _  _  _ \n"
      + "  || | _||_||_ |_   ||_||_|\n"
      + "  ||_| _|  | _||_|  ||_| _|\n"
      + "                           \n";

    var input5 = 
        "   __  _     _  _  _  _  _ \n"
      + "  || | _||_||_ |_   ||_||_|\n"
      + "  ||_| _|  | _||_|  ||_| _|\n"
      + "                           \n";


    var bank = new Bank();

    it("testAllOne", function() {
        expect(bank.parse(input)).toBe(111111111);
    });

    it("testAllTwo", function() {
        expect(bank.parse(input2)).toBe(222222222);
    });

    it("testAllDifferentNumbers", function() {
        expect(bank.parse(input3)).toBe(123456789);
    });

    it("testWithZero", function() {
        expect(bank.parse(input4)).toBe(103456789);
    });

    it("testInvalidNumber", function() {
        expect(bank.parse(input5)).toEqual(jasmine.any(Number));
        expect(isNaN(bank.parse(input5))).toBe(true);
    });

});
