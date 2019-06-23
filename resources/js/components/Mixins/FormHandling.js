export default {
    data() {
        return {
            error: false,
            errorMessages: {}
        }
    },
    methods: {
        handleErrors(error) {
            this.error = true;
            this.errorMessages = error.response.data.error.message || {};
        }
    }
}
