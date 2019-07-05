<script>
    export default {
        render (createElement) {
            if (this.$slots.default) {
                this.$slots.default = this.$slots.default.map(slot => {
                    if (slot.data) {
                        slot.data.class = Object.assign(
                            {},
                            slot.data.class,
                            {
                                'w-1/2': true,
                                'sm:w-1/4': true,
                                'lg:w-1/5': true,
                                'xl:w-1/6': true,
                                'px-1 ': true,
                                'sm:px-2': true,
                                'mt-2': true,
                                'sm:mt-4': true
                            }
                        );
                    }

                    return slot;
                });
            }

            return createElement(
                'div',
                {
                    attrs: { class: 'flex flex-row flex-wrap -mx-2' }
                },
                this.$slots.default
            );
        }
    };
</script>
