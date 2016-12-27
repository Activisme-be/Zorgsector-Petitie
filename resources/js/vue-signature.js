new Vue({
    el: '#signature',

    data: {
        signature: {
            name:  '',
            day:   '',
            month: '',
            year:  '',
            email: '',
            city:  ''
        },

        submitted: false
    },

    computed: {
        errors: function() {
            for (var key in this.signature) {
                if ( ! this.signature[key]) return true;
            }

            return false;
        }
    }
});