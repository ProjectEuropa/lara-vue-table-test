<template>
    <div>
        <search-filter v-on:call-parent-search="searchFunction"></search-filter>
        <div class="table-number">{{ total }}件中 {{ from }} 〜 {{ to }}件</div>
        <div class="row table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-header">
                        <th class="download">ダウンロード</th>
                        <th class="owner">オーナー名</th>
                        <th>コメント</th>
                        <th>ファイル名</th>
                        <th class="created-at">アップロード日時</th>
                        <th class="delete">削除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="file in files" :key="file.id">
                        <td>
                            <a :href="getLinkFile(file.id)">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>{{ file.upload_owner_name }}</td>
                        <td><div v-html="nl2br(file.file_comment)"></div>
                            <span v-if="file.search_tag1"><i class="fa fa-search"></i>{{file.search_tag1}}</span>
                            <span v-if="file.search_tag2"><i class="fa fa-search"></i>{{file.search_tag2}}</span>
                            <span v-if="file.search_tag3"><i class="fa fa-search"></i>{{file.search_tag3}}</span>
                            <span v-if="file.search_tag4"><i class="fa fa-search"></i>{{file.search_tag4}}</span>
                        </td>
                        <td>{{ file.file_name }}</td>
                        <td>{{ file.created_at }}</td>
                        <td>
                            <form method="post" action="" class="form-horizontal" v-if="file.upload_user_id == null || file.upload_user_id == 0">
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
        <div class="d-flex justify-content-left">
            <nav class="my-4 pt-2">
                <ul class="pagination pagination-circle mb-0">
                    <li class="page-item clearfix d-none d-md-block" @click="pagenate(first_page_url)">
                        <a class="page-link waves-effect waves-effect">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link waves-effect waves-effect" aria-label="Previous" @click="pagenate(prev_page_url)">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <!-- <li class="page-item">
                        <a class="page-link waves-effect waves-effect">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link waves-effect waves-effect">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link waves-effect waves-effect">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link waves-effect waves-effect">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link waves-effect waves-effect">5</a>
                    </li> -->
                    <li class="page-item">
                        <a class="page-link waves-effect waves-effect" aria-label="Next"  @click="pagenate(next_page_url)">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                    <li class="page-item clearfix d-none d-md-block">
                        <a class="page-link waves-effect waves-effect" @click="pagenate(last_page_url)">Last</a>
                    </li>
                </ul>
            </nav>
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
        current_page: 0,
        last_page: 0,
        total: 0,
        from: 0,
        to: 0,
        csrf: myToken.csrfToken,
        first_page_url: '',
        last_page_url: '',
        next_page_url: '',
        prev_page_url: '',
    };
  },
  mounted() {
      this.pagenate('api/search/team');
  },
  methods: {
    searchFunction(keyword, sortSelect) {
      alert(keyword + sortSelect);
      console.log(this);
    },
    getLinkFile: function(id) {
      return id;
    },
    nl2br(value) {
      return value !== null ? value.replace(/\n/g, "<br>") : '';
    },
    pagenate(url) {
      axios.get(url).then(res => {
        this.files = res.data.data;
        this.current_page = res.data.current_page;
        this.last_page = res.data.last_page;
        this.total = res.data.total;
        this.from = res.data.from;
        this.to = res.data.to;
        this.first_page_url = res.data.first_page_url;
        this.last_page_url = res.data.last_page_url;
        this.next_page_url = res.data.next_page_url;
        this.prev_page_url = res.data.prev_page_url;
        console.log(res);
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.table-header {
    .download,.owner  {
        width: 100px;
    }
    .created-at {
        width: 160px;
    }
    .delete {
        width: 200px
    }
}

@media screen and (max-width:767px){
    table {
        overflow: auto;
        white-space: nowrap;
    }
}
</style>

