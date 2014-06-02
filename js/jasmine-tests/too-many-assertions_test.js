describe('TooManyAssertions', function() {
    var factory = null;

    beforeEach(function() {
        factory = new IPC.TooManyAssertions();
    });

    it('#isName, #setName', function() {
        expect(factory.isName('default')).toBe(true);
        expect(factory.isName('ex1')).toBe(false);
        expect(factory.isName('ex2')).toBe(false);
        factory.setName('ex1');
        expect(factory.isName('default')).toBe(false);
        expect(factory.isName('ex1')).toBe(true);
        expect(factory.isName('ex2')).toBe(false);
        factory.setName('ex2');
        expect(factory.isName('default')).toBe(false);
        expect(factory.isName('ex1')).toBe(false);
        expect(factory.isName('ex2')).toBe(true);
        factory.setName(undefined);
        expect(factory.isName('default')).toBe(false);
        expect(factory.isName('ex1')).toBe(false);
        expect(factory.isName('ex2')).toBe(true);
    });
});