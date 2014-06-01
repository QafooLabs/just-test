IPC.TooManyAssertions = function() {
    var __name = 'default';

    this.setName = function(name) {
        __name = name;
    };

    this.isName = function(name) {
        return (__name == name);
    };
};