<script>
export default {
    render (createElement) {
        this.$slots.default = this.$slots.default.map(slot => {
            if (slot.data) {
                slot.data.class = Object.assign(
                    {},
                    slot.data.class,
                    {
                        'w-full': true,
                        'sm:px-2': true,
                        'sm:w-1/2': true,
                        'md:w-1/3': true,
                        'lg:w-1/4': true,
                        'xl:w-1/5': true,
                        'mt-2': true,
                        'sm:mt-4': true
                    }
                );
            }

            return slot;
        });

        return createElement(
            'div',
            {
                attrs: { class: 'flex flex-col sm:flex-row sm:flex-wrap sm:-mx-2' }
            },
            this.$slots.default
        );
    }
};
</script>
