<template>
    <div v-if="lastPage > 1" class="flex items-center justify-between">
        <Button @click.native="previousPage"><i class="fa fa-chevron-left"></i></Button>
        <div>
            <span
                :class="pageActive(page)"
                class="inline-flex flex-col justify-around cursor-pointer inline-block w-6 h-6 text-center mx-2"
                @click="selectPage(page)"
                v-for="page in pages"
            >
                <span>{{ page }}</span>
            </span>
        </div>
        <Button @click.native="nextPage"><i class="fa fa-chevron-right"></i></Button>
    </div>
</template>

<script>
import Button from './StyledComponents/Buttons/Button';

export default {
    props: ['lastPage', 'currentPage'],
    computed: {
        pages () {
            const totalPages = parseInt(this.lastPage);

            if (totalPages > 7) {
                if (this.currentPage <= 4) {
                    return [1, 2, 3, 4, 5, '...', this.lastPage];
                }

                if (this.currentPage > 4 && this.currentPage <= (totalPages - 4)) {
                    return [1, '...', this.currentPage - 1, this.currentPage, this.currentPage + 1, '...', this.lastPage];
                }

                if (this.currentPage > (totalPages - 4)) {
                    return [1, '...', totalPages - 3, totalPages - 2, totalPages - 1, totalPages];
                }
            }

            let pages = [];

            for (let i = 1; i <= totalPages; i++) {
                pages.push(i);
            }

            return pages;
        }
    },
    components: {
        Button
    },
    methods: {
        pageActive (page) {
            return {
                'bg-gray-300 rounded rounded-full': this.currentPage === page
            }
        },
        previousPage () {
            const newPage = Math.max(1, this.currentPage - 1);
            this.$emit('change', newPage);
        },
        nextPage () {
            const newPage = Math.min(this.lastPage, this.currentPage + 1);
            this.$emit('change', newPage);
        },
        selectPage (page) {
            if (Number.isNaN(parseInt(page))) {
                return;
            }

            this.$emit('change', page);
        }
    }
};
</script>
