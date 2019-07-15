<script>

export default {
    data () {
        return {
            query: '',
            suggestions: [],
            suggestionsVisible: false,
            isLoading: false,
            firstShow: false
        }
    },
    methods: {
        search (query) {},
        // Ideal place to prefetch suggestions
        beforeFirstShow () {},
        show () {
            this.$emit('show');
            this.suggestionsVisible = true;

            if (!this.firstShow) {
                this.beforeFirstShow();
                this.firstShow = true;
            }
        },
        hide (e) {
            const clickedOnSearchBar = Array.from(this.$refs.searchBar.$el.children).some((element) => {
                return e.target === element;
            });

            if (!clickedOnSearchBar) {
                this.$emit('hide');
                this.suggestionsVisible = false;
            }
        }
    }
};
</script>
