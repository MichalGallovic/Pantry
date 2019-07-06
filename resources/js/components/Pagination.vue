<template>
    <div v-if="lastPage > 1" class="flex items-center justify-between">
        <Button @click.native="previousPage">Previous</Button>
        <div>
            <span
                :class="pageActive(page)"
                class="inline-flex flex-col justify-around cursor-pointer inline-block w-8 h-8 text-center mx-2"
                @click="$emit('change', page)"
                v-for="page in pages"
            >
                <span>{{ page }}</span>
            </span>
        </div>
        <Button @click.native="nextPage">Next</Button>
    </div>
</template>

<script>
import Button from './StyledComponents/Buttons/Button';

export default {
    props: ['lastPage', 'currentPage'],
    computed: {
        pages () {
            const totalPages = this.lastPage;

            if (totalPages > 5) {
                return [1, 2, '...', this.last - 1, this.last]
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
        }
    }
};
</script>
