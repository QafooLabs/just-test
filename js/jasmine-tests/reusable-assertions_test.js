describe('Reusable Assertions', function() {
    var reusableAssertions = null;

    beforeEach(function() {
        reusableAssertions = new IPC.ReusableAssertions();
    });

    describe('loadUser', function() {
        it('sends tracking info when successfully loading a user', function() {
            var trackingSpy = {
                sendInfo: function() {}
            };
            reusableAssertions.setTracking(trackingSpy);

            spyOn(trackingSpy, 'sendInfo');
            reusableAssertions.loadUser({username: 'tobySen'});
            expect(trackingSpy.sendInfo).toHaveBeenCalledWith(123456);
        });

        it('sends tracking info when loading user was not successful', function() {
            var trackingSpy = {
                sendInfo: function() {}
            };
            reusableAssertions.setTracking(trackingSpy);

            spyOn(trackingSpy, 'sendInfo');
            reusableAssertions.loadUser({username: 'foobar'});
            expect(trackingSpy.sendInfo).toHaveBeenCalledWith(123456);
        });
    });
});