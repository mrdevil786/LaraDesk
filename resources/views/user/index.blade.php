@extends('layout.main')

@section('main-section')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Users</h1>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Users</h3>          
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">First name</th>
                                    <th class="wd-15p border-bottom-0">Last name</th>
                                    <th class="wd-20p border-bottom-0">Position</th>
                                    <th class="wd-15p border-bottom-0">Start date</th>
                                    <th class="wd-10p border-bottom-0">Salary</th>
                                    <th class="wd-25p border-bottom-0">E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bella</td>
                                    <td>Chloe</td>
                                    <td>System Developer</td>
                                    <td>2018/03/12</td>
                                    <td>$654,765</td>
                                    <td>b.Chloe@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Donna</td>
                                    <td>Bond</td>
                                    <td>Account Manager</td>
                                    <td>2012/02/21</td>
                                    <td>$543,654</td>
                                    <td>d.bond@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Harry</td>
                                    <td>Carr</td>
                                    <td>Technical Manager</td>
                                    <td>20011/02/87</td>
                                    <td>$86,000</td>
                                    <td>h.carr@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Lucas</td>
                                    <td>Dyer</td>
                                    <td>Javascript Developer</td>
                                    <td>2014/08/23</td>
                                    <td>$456,123</td>
                                    <td>l.dyer@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Karen</td>
                                    <td>Hill</td>
                                    <td>Sales Manager</td>
                                    <td>2010/7/14</td>
                                    <td>$432,230</td>
                                    <td>k.hill@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Dominic</td>
                                    <td>Hudson</td>
                                    <td>Sales Assistant</td>
                                    <td>2015/10/16</td>
                                    <td>$654,300</td>
                                    <td>d.hudson@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Herrod</td>
                                    <td>Chandler</td>
                                    <td>Integration Specialist</td>
                                    <td>2012/08/06</td>
                                    <td>$137,500</td>
                                    <td>h.chandler@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jonathan</td>
                                    <td>Ince</td>
                                    <td>junior Manager</td>
                                    <td>2012/11/23</td>
                                    <td>$345,789</td>
                                    <td>j.ince@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Leonard</td>
                                    <td>Ellison</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>2010/03/19</td>
                                    <td>$205,500</td>
                                    <td>l.ellison@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Madeleine</td>
                                    <td>Lee</td>
                                    <td>Software Developer</td>
                                    <td>20015/8/23</td>
                                    <td>$456,890</td>
                                    <td>m.lee@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Karen</td>
                                    <td>Miller</td>
                                    <td>Office Director</td>
                                    <td>2012/9/25</td>
                                    <td>$87,654</td>
                                    <td>k.miller@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Lisa</td>
                                    <td>Smith</td>
                                    <td>Support Lead</td>
                                    <td>2011/05/21</td>
                                    <td>$342,000</td>
                                    <td>l.simth@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Morgan</td>
                                    <td>Keith</td>
                                    <td>Accountant</td>
                                    <td>2012/11/27</td>
                                    <td>$675,245</td>
                                    <td>m.keith@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Nathan</td>
                                    <td>Mills</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>2014/10/8</td>
                                    <td>$765,980</td>
                                    <td>n.mills@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Ruth</td>
                                    <td>May</td>
                                    <td>office Manager</td>
                                    <td>2010/03/17</td>
                                    <td>$654,765</td>
                                    <td>r.may@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Penelope</td>
                                    <td>Ogden</td>
                                    <td>Marketing Manager</td>
                                    <td>2013/5/22</td>
                                    <td>$345,510</td>
                                    <td>p.ogden@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Sean</td>
                                    <td>Piper</td>
                                    <td>Financial Officer</td>
                                    <td>2014/06/11</td>
                                    <td>$725,000</td>
                                    <td>s.piper@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Trevor</td>
                                    <td>Ross</td>
                                    <td>Systems Administrator</td>
                                    <td>2011/05/23</td>
                                    <td>$237,500</td>
                                    <td>t.ross@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Vanessa</td>
                                    <td>Robertson</td>
                                    <td>Software Designer</td>
                                    <td>2014/6/23</td>
                                    <td>$765,654</td>
                                    <td>v.robertson@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Una</td>
                                    <td>Richard</td>
                                    <td>Personnel Manager</td>
                                    <td>2014/5/22</td>
                                    <td>$765,290</td>
                                    <td>u.richard@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Justin</td>
                                    <td>Peters</td>
                                    <td>Development lead</td>
                                    <td>2013/10/23</td>
                                    <td>$765,654</td>
                                    <td>j.peters@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Adrian</td>
                                    <td>Terry</td>
                                    <td>Marketing Officer</td>
                                    <td>2013/04/21</td>
                                    <td>$543,769</td>
                                    <td>a.terry@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Cameron</td>
                                    <td>Watson</td>
                                    <td>Sales Support</td>
                                    <td>2013/9/7</td>
                                    <td>$675,876</td>
                                    <td>c.watson@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Evan</td>
                                    <td>Terry</td>
                                    <td>Sales Manager</td>
                                    <td>2013/10/26</td>
                                    <td>$66,340</td>
                                    <td>d.terry@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Angelica</td>
                                    <td>Ramos</td>
                                    <td>Chief Executive Officer</td>
                                    <td>20017/10/15</td>
                                    <td>$6,234,000</td>
                                    <td>a.ramos@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Connor</td>
                                    <td>Johne</td>
                                    <td>Web Developer</td>
                                    <td>2011/1/25</td>
                                    <td>$92,575</td>
                                    <td>C.johne@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jennifer</td>
                                    <td>Chang</td>
                                    <td>Regional Director</td>
                                    <td>2012/17/11</td>
                                    <td>$546,890</td>
                                    <td>j.chang@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Brenden</td>
                                    <td>Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>2013/07/14</td>
                                    <td>$206,850</td>
                                    <td>b.wagner@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Fiona</td>
                                    <td>Green</td>
                                    <td>Chief Operating Officer</td>
                                    <td>2015/06/23</td>
                                    <td>$345,789</td>
                                    <td>f.green@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Shou</td>
                                    <td>Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>2013/07/19</td>
                                    <td>$335,300</td>
                                    <td>s.itou@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Michelle</td>
                                    <td>House</td>
                                    <td>Integration Specialist</td>
                                    <td>2016/07/18</td>
                                    <td>$76,890</td>
                                    <td>m.house@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Suki</td>
                                    <td>Burks</td>
                                    <td>Developer</td>
                                    <td>2010/11/45</td>
                                    <td>$678,890</td>
                                    <td>s.burks@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Prescott</td>
                                    <td>Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>2014/12/25</td>
                                    <td>$789,100</td>
                                    <td>p.bartlett@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Gavin</td>
                                    <td>Cortez</td>
                                    <td>Team Leader</td>
                                    <td>2015/1/19</td>
                                    <td>$345,890</td>
                                    <td>g.cortez@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Martena</td>
                                    <td>Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>2011/03/09</td>
                                    <td>$324,050</td>
                                    <td>m.mccray@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Unity</td>
                                    <td>Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>2014/7/28</td>
                                    <td>$34,983</td>
                                    <td>u.butler@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Howard</td>
                                    <td>Hatfield</td>
                                    <td>Office Manager</td>
                                    <td>2013/8/19</td>
                                    <td>$98,000</td>
                                    <td>h.hatfield@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Hope</td>
                                    <td>Fuentes</td>
                                    <td>Secretary</td>
                                    <td>2015/07/28</td>
                                    <td>$78,879</td>
                                    <td>h.fuentes@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Vivian</td>
                                    <td>Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>2010/02/14</td>
                                    <td>$452,500</td>
                                    <td>v.harrell@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Timothy</td>
                                    <td>Mooney</td>
                                    <td>Office Manager</td>
                                    <td>20016/12/11</td>
                                    <td>$136,200</td>
                                    <td>t.mooney@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jackson</td>
                                    <td>Bradshaw</td>
                                    <td>Director</td>
                                    <td>2011/09/26</td>
                                    <td>$645,750</td>
                                    <td>j.bradshaw@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Olivia</td>
                                    <td>Liang</td>
                                    <td>Support Engineer</td>
                                    <td>2014/02/03</td>
                                    <td>$234,500</td>
                                    <td>o.liang@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Bruno</td>
                                    <td>Nash</td>
                                    <td>Software Engineer</td>
                                    <td>2015/05/03</td>
                                    <td>$163,500</td>
                                    <td>b.nash@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Sakura</td>
                                    <td>Yamamoto</td>
                                    <td>Support Engineer</td>
                                    <td>2010/08/19</td>
                                    <td>$139,575</td>
                                    <td>s.yamamoto@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Thor</td>
                                    <td>Walton</td>
                                    <td>Developer</td>
                                    <td>2012/08/11</td>
                                    <td>$98,540</td>
                                    <td>t.walton@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Finn</td>
                                    <td>Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>2016/07/07</td>
                                    <td>$87,500</td>
                                    <td>f.camacho@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Serge</td>
                                    <td>Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>2017/04/09</td>
                                    <td>$138,575</td>
                                    <td>s.baldwin@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Zenaida</td>
                                    <td>Frank</td>
                                    <td>Software Engineer</td>
                                    <td>2018/01/04</td>
                                    <td>$125,250</td>
                                    <td>z.frank@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Zorita</td>
                                    <td>Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>2017/06/01</td>
                                    <td>$115,000</td>
                                    <td>z.serrano@datatables.net</td>
                                </tr>
                                <tr>
                                    <td>Jennifer</td>
                                    <td>Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>2017/02/01</td>
                                    <td>$75,650</td>
                                    <td>j.acosta@datatables.net</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection

@section('custom-script')
    <!-- DATA TABLE JS-->
    <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="../assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="../assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="../assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="../assets/js/table-data.js"></script>
@endsection
