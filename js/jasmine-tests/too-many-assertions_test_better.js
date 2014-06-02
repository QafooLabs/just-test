describe('TooManyAssertions', function() {
	var factory = null;

	beforeEach(function() {
		factory = new IPC.TooManyAssertions();
	});

    describe('isName(), setName()', function() {
        it('has a default', function() {
            expect(factory.isName('default')).toBe(true);
            expect(factory.isName('Heinz')).toBe(false);
        });

        it('can be changed', function() {
            factory.setName('Heinz');
            expect(factory.isName('default')).toBe(false);
            expect(factory.isName('Heinz')).toBe(true);
        });

        it('is not changed when providing undefined', function() {
            factory.setName('Heinz');
            factory.setName(undefined);
            expect(factory.isName('default')).toBe(false);
            expect(factory.isName('Heinz')).toBe(true);
        });
    });
});