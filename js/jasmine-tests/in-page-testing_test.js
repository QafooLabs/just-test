describe('In-Page-Testing', function() {
    var inPageTesting;

    beforeEach(function() {
        inPageTesting = new IPC.InPageTesting();
    });

    describe('hasNavigationElement()', function() {

        it('is available by default', function() {
            expect(inPageTesting.hasNavigationElement()).toBe(true);
        });
    });
});