export default {
    data () {
        return {
            currentPage: 1,
            lastPage: null
        }
    },
    methods: {
        setPagination (currentPage, lastPage) {
            this.lastPage = lastPage;
            this.currentPage = currentPage;
        }
    }
}
