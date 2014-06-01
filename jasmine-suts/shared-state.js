IPC.SharedState = function() {
    this.actionDependingonPageState = function() {
        if (IPC.PageState.isState('notLoggedIn')) {
            return 'login';
        }
        return 'logout';
    };

    this.someOtherActionDependingOnPageState = function() {
        return 'done';
    };
};

IPC.PageState = function() {};
IPC.PageState.__state = 'start';

IPC.PageState.setState = function(state) {
    IPC.PageState.__state = state;
};

IPC.PageState.isState = function(state) {
    return (IPC.PageState.__state == state);
};