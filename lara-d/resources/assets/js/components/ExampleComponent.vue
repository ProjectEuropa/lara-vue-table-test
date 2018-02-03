<template>
    <div class="container">
        <search-filter v-on:call-parent-search="searchFunction"></search-filter>
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-header">
                        <th>ダウンロード</th>
                        <th>オーナー名</th>
                        <th>コメント</th>
                        <th>ファイル名</th>
                        <th>アップロード日時</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="file in files" :key="file.id">
                        <td>{{ file.id }}</td>
                        <td>{{ file.owner }}</td>
                        <td>{{ file.comment }}</td>
                        <td>{{ file.file_name }}</td>
                        <td>{{ file.created_at }}</td>
                        <td>{{ file.delete_flg }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import SearchFilter from './SearchComponent';
export default {
    components: {
        SearchFilter
    },
    data() {
      return {
        files: []
      }
    },
    mounted() {
      axios.get('http://localhost/test-data/test.json').then(res => {
        this.files = res.data;
      });
    },
    methods: {
        searchFunction(keyword, sort) {
            alert(keyword + sort);
        }
    }
}
</script>
