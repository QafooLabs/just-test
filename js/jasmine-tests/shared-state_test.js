describe('Shared state', function() {
    var sharedState = null;

    beforeEach(function() {
        sharedState = new IPC.SharedState();
    });

//    // Breaks the test
//    describe('someOtherActionDependingOnPageState()', function() {
//        it('breaks my other tests', function() {
//            IPC.PageState.setState('notLoggedIn');
//        })
//    });

    describe('actionDependingonPageState()', function() {
        it('is logout by default', function() {
            expect(sharedState.actionDependingonPageState()).toEqual('logout');
        });

        it('is login when page state is foo', function() {
            IPC.PageState.setState('notLoggedIn');
            expect(sharedState.actionDependingonPageState()).toEqual('login');
        });
    });
});