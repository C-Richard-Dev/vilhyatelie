import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';

const search = ref('');

function submitSearch(e) {
    e.preventDefault();
    if (search.value.trim() !== '') {
        router.get(`/search`, { query: search.value });
    }
}

export default {
    data() {
        return {
            open: false,
        };
    },
};
