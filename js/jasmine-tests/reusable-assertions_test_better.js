describe('Reusable Assertions', function() {
	var reusableAssertions = null;

	beforeEach(function() {
		reusableAssertions = new IPC.ReusableAssertions();
	});

	describe('loadUser', function() {
		var trackingSpy = null;

		var assertTrackingCall = function() {
			expect(trackingSpy.sendInfo).toHaveBeenCalledWith(123456);
		};

		var setupTrackingSpy = function() {
			trackingSpy = {
				sendInfo: function() {}
			};
			spyOn(trackingSpy, 'sendInfo');
		};

		beforeEach(function() {
			setupTrackingSpy();
			reusableAssertions.setTracking(trackingSpy);
		});

		it('sends tracking info when successfully loading a user', function() {
			reusableAssertions.loadUser({username: 'tobySen'});
			assertTrackingCall();
		});

		it('sends tracking info when loading user was not successful', function() {
			reusableAssertions.loadUser({username: 'foobar'});
			assertTrackingCall();
		});
	});
});