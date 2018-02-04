<template>
    <div class="container">
        <search-filter v-on:call-parent-search="searchFunction"></search-filter>
        <div class="row table-responsive">
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
                        <td>
                            <a :href="getLinkFile(file.id)">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{ file.owner }}</td>
                        <td>{{ file.comment }}</td>
                        <td>{{ file.file_name }}</td>
                        <td>{{ file.created_at }}</td>
                        <td>
                            <form method="post" action="" class="form-horizontal" v-if="file.delete_flg == 1">
                                <div class="form-group">
                                    <div class="form-inline">
                                        <input type="text" class="input-alternate" placeholder="削除パスワード">
                                        <input type="hidden" name="id" class="form-control" value="278">
                                        <button type="submit" class="btn btn-info btn-delete" value="SGTSYR1.CHE">削除</button>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" :value="csrf">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import SearchFilter from "./SearchComponent";
export default {
  components: {
    SearchFilter
  },
  data() {
    return {
      files: [],
      csrf: myToken.csrfToken,
    };
  },
  mounted() {
    axios.get("http://localhost/test-data/test.json").then(res => {
      this.files = res.data;
    });
  },
  methods: {
    searchFunction(keyword, sortSelect) {
      alert(keyword + sortSelect);
    },
    getLinkFile: function(id) {
      return id;
    }
  }
};
</script>
