describe('In-Page-Testing', function() {
	var inPageTesting;

	beforeEach(function() {
		inPageTesting = new IPC.InPageTesting();
	});

	describe('hasNavigationElement()', function() {

		it('is is true if there is a <nav> Element on the page', function() {
			jasmine.getFixtures().set('<nav></nav>');
			expect(inPageTesting.hasNavigationElement()).toBe(true);
		});
	});
});