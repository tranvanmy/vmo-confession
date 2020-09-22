<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['id_category'=>1, 
            'title'=>'Chia tiền với người yêu',
            'Content'=>'Ko biết chị em nào như mình ko? Mình là con gái nhưng kiểu người sòng phẳng, thực ra nếu có ai bao ăn bao tất thì cũng sướng thật và sướng thận đấy, nhưng mà cứ chia nhau cho nó sướng cả tâm nữa. Thoải mái, ăn xong đỡ phải nghĩ ngợi là họ bao mình sau mình phải bao ko, phải khao lại ko……v…v…
            Vì thế nên lúc yêu đương mình cũng không để người yêu thiệt thòi bao giờ. Đi chơi thì ông trả tiền ăn mình trả tiền nước. Người ta mua vé xem phim thì mình mua bỏng ngô. Cứ thế cho nó nhàn tâm. Hơn nữa để người yêu trả hết thì mình cũng thấy tội, ai cũng kiếm tiền vất vả mà nhỉ chứ có phải từ trên trời rơi xuống đâu.
            Mình có 1 người bạn thân, hơn mình vài tuổi, nhưng mà rất thân ấy. Đi chơi với bạn mình cũng hay chia ra cho nhau dễ thở. Ấy vậy mà anh bạn này chả bao giờ để mình trả tiền. Nói thế nào cũng bao tất, mặc dù anh ko giàu có gì. Ờ lâu dần cũng thành quen.
            Sau này mình vừa thất tình, vừa thất nghiệp, cũng may có anh bạn bao ăn đỡ sầu. Hay rủ nhau cafe, 1 năm đi ăn vài lần mấy món ăn vặt chứ không nhiều nhặn gì.
            Ấy thế mà giờ sắp cưới rồi ạ. Ôi chả biết yêu từ bao giờ. Cũng lạ, mình lại chẳng thấy việc nên chia tiền là hợp lý nữa. Cứ đi chơi thì auto anh ấy trả hết. Mình còn chả cầm ví, cứ cầm mỗi cái điện thoại rồi leo lên xe thôi. Đến cái thẻ lương người ta còn giao cho mình thì lăn tăn gì mấy khoản nhỏ.
            Thế nên mình nghĩ, chia tiền với người người yêu chẳng qua là vì người yêu bạn cũng có tâm lý muốn chia tiền thôi.',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],

            ['id_category'=>2, 

            'title'=>' 27 tuổi, lương hơn 30tr nhưng lại chẳng tiết kiệm được đồng nào…có nên tiếp tục.',
            'Content'=>'Chào mọi người, anh người yêu mình năm nay 27 tuổi, đi làm được 5 năm và lương hiện tại quanh mức 30tr, mình thì đang năm 3, bản thân lúc đâu nghe anh nói chuyện, tiếp xúc thấy anh cũng giỏi, vui tính, hoà đồng, mau mồm mau miệng, công việc cũng ổn, ở thuê thôi nhưng em cảm giác anh ấy là người có chí, sớm muộn gì chẳng có nhà, có xe…cứ có chí là đc, ngoại hình cũng ok nên đồng ý yêu, mà yêu được gần 8 tháng thì em phát hiện ra anh ấy ko để tiết kiệm được đồng nào mặc dù lương so với các bạn đồng trang lứa cũng cao, có những lúc phải vay em 1 – 2 triệu nhưng khi có lương là trả ngay, em mới thắc mắc hỏi anh ấy tại sao ko tiết kiệm đc đồng nào:
            “Sao anh ko tiết kiệm được đồng nào vậy, anh nói em nghe 1 tháng anh ăn tiêu kiểu gì, chả thấy mua sắm gì nhiều mà hết sạch tiền, anh giấu đi à hay gửi về cho bố mẹ”
            “Nào có gửi đc đồng nào đâu”
            “Vậy anh ăn tiêu như nào, anh nói em nghe”
            “Tiền thuê nhà 1 tháng 6 triệu, điện nước cap gửi xe 1 tháng gọi là 1,5 triệu đi, ăn 1 tháng hết khoảng 6 triệu nữa, đấy là mình anh ăn. Xăng xe điện thoại hết 1 triệu, đi ma chay cưới hỏi hết 1tr nữa, đi chơi với em với mua quà hết khoảng 3t triệu nữa”
            “Đấy, 1 tháng anh tiêu nhoè ra hết có gần 20tr vậy số còn lại đâu, cho g.ái à?”
            Anh ấy nhìn em, bẽn lẽn trả lời:
            “Ko, thi thoảng anh đánh lô đánh đề”
            “Anh thi thoảng mà 1 tháng 10 triệu tiền lô đề, ko trúng con nào à”
            “Trúng nhưng ít. Mà đầy người còn đánh to hơn kia kìa sao em ko nói”
            Nói đến đây là chịu rồi. Em đắn đo có nên tiếp tục chuyện tình cảm này ko? Người ta bảo cờ bạc là bác thằng bần, đánh đề ra đê mà ở, như này thì bao nhiêu cho đủ. Hỏi sao ko tiết kiệm đc cái đồng mẹ nào?',
            'published'=>0,
            'published_at'=>new DateTime(),
            ],


            ['id_category'=>2, 

            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'Các nhà khoa học của Trường Đại học Y Pittsburgh (Mỹ) đã phân lập được phân tử sinh học nhỏ nhất cho đến nay có thể vô hiệu hóa hoàn toàn và rõ rệt virus SARS-CoV-2 gây bệnh COVID-19
            Loại kháng thể "nhỏ mà có võ" được các nhà khoa học Mỹ phát hiện làm dấy lên hi vọng trong bối cảnh chưa có vắc xin hiệu quả và an toàn tiêm chủng đại trà
            Thành phần kháng thể này có kích thước nhỏ hơn kháng thể thông thường gấp 10 lần và đã được sử dụng để tạo ra một loại thuốc có tên Ab8. Các nhà khoa học kỳ vọng loại thuốc được bào chế từ kháng thể "nhỏ mà có võ" này sẽ sớm được sử dụng như một liệu pháp phòng chống SARS-CoV-2.
            Nhóm nghiên cứu nhận thấy những con chuột được cho sử dụng Ab8 ở nhiều mức độ khác nhau có nguy cơ nhiễm SARS-CoV-2 thấp hơn những con không dùng. Nghiên cứu sâu hơn, các nhà khoa học cho biết khi dùng Abe48 nồng độ thấp, virus bị chặn đứng và không thể xâm nhập tế bào của chuột, giúp chúng không bị nhiễm bệnh
            Kích thước siêu nhỏ của kháng thể không chỉ làm tăng khả năng khuếch tán trong các mô để vô hiệu hóa virus tốt hơn, mà còn cho phép các nhà khoa học tính đến khả năng sử dụng thuốc bằng nhiều cách như hít qua mũi hoặc chích dưới da.
            Quan trọng hơn, loại thuốc này không liên kết với các tế bào của con người - một dấu hiệu tốt cho thấy nó sẽ không có tác dụng phụ tiêu cực.
            Các nước trên thế giới đang cố gắng về đích trong cuộc chiến chống lại Covid-19 rồi, cố lên mọi người!!!!
            Theo: Báo Tuổi Trẻ, Báo Lao động',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],
            ['id_category'=>3, 
            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'Có một đứa con thành thật quá mức trong nhà đôi khi lại gây những tình huống không biết giấu mặt đi đâu của các vị phụ huynh. Đến tuổi con đi học,
            những chuyện "thâm cung bí sử" trong nhà không những được kể với hàng xóm, ông bà, người thân... mà còn được báo cáo một cách rõ ràng rành mạch
             với cô giáo qua những bài tập làm văn. Học sinh đâu biết, cái nhìn ngây thơ vô số tội của mình lại chính là nguyên nhân gây ra những "cơn đau
              tim" của bố mẹ. Giáo viên chấm bài xong chỉ biết "cạn lời" và đề nghị được "triệu hồi" quý phụ huynh gấp.',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],
            ['id_category'=>3, 
            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'Mới đây, cộng đồng mạng đang truyền tay nhau một bài văn bị cô giáo chấm điểm 1 và để lại lời phê: "Mai mời phụ huynh lên gặp cô!". Bài văn của một học sinh lớp 3, kể về nghề nghiệp "khó nói" của mẹ mình
             và khiến bất kỳ ai cũng phải bật cười khi đọc.',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],
            ['id_category'=>4, 
            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'“Công việc của mẹ em là làm nội trợ. Hàng ngày khi kim ngắn chỉ vào số 6, kim dài chỉ số 3 là cả nhà phải giữ im lặng cho mẹ làm việc. Có lần em và em trai em đùa nghịch rõ to đã bị mẹ tát cho mỗi đứa một cái và bảo “chúng mày im đi không, nhầm hết bảng phách
             của tao bây giờ”. Trong lúc làm việc mẹ em rất tập trung, thỉnh thoảng lại nói “một nhân bảy mươi bạch thủ, tổng chia hết cho 3, l‌ô rơi”',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],
            ['id_category'=>3, 
            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'Mẹ bảo phải học toán thật giỏi mới làm được. Hôm em xem trên vô tuyến có chú chim bồ câu đưa thư, e
            m lại nhớ đến mẹ cứ hay quát bố “chuyển giấy cho nhà Dung Phượng chưa, có mỗi việc đấy mà quên suốt thế, nó n‌ổ cho một cái
             thì bán nhà ra đê mà ở”.


            Sợ bố hay quên lại phải bán nhà ra đê nên em đã nảy ra một suy nghĩ bảo với mẹ “mẹ ơi mẹ nuôi chim bồ câu đi, mẹ buộc giấy vào chân chim
             bồ câu để nó chuyển giấy đến nhà bác Phượng đi, nó n‌ổ một cái thì không phải bán nhà, con sợ ra đê lắm”.',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],
            ['id_category'=>1, 
            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'Mẹ định giơ tay tát em đã chạy kịp “nó mà bay đến đồn công an thì chết tao à”. Mẹ bảo có
             ai hỏi thì phải bảo là “tao làm nội trợ”. Còn công việc của bố em là đi đánh bài và nấu cơm cho cả nhà”.

            Trong rất nhiều bình luận để lại dưới bài văn, phần lớn không đồng ý với điểm 1 mà cô giáo dành cho em học sinh. Bởi cộng đồng mạng cho
             rằng bài văn tả rất chân thực, cô giáo cũng dạy học sinh không được nói dối nên bé chỉ tả đúng những chuyện trong nhà . Dù có sai chính tả đôi chút nhưng việc bị mời phụ huynh lên gặp là không đáng. Ngoài ra, công việc "lô đề, cờ bạc" của bố mẹ nếu có như trong bài viết cũng là sự phạm pháp của bố mẹ, chứ không liên quan gì đến học sinh. Thậm chí nhiều cư dân mạng còn mạnh dạn tự chấm điểm cho bài văn là 6 điểm. 
            
            Nhắc đến bài văn "triệu hồi phụ huynh" lên gặp cô giáo, cộng đồng mạng lại tiếp tục tìm lại câu chuyện cách đây 1 năm. Thời điểm đó
             một bài văn tả con vật em yêu thích cũng "gây bão mạng" vì sự thật thà... quá mức cần thiết của một em học sinh lớp 3',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],
            ['id_category'=>4, 
            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'Nguyên văn bài làm của em học sinh: “Có rất nhiều con vật mà em thích. Nhưng em thích nhất là con chó. 
            Không những em thích mà bố em cũng rất thích. Cứ dịp cuối tuần hoặc cuối tháng, bố em bảo mẹ em chiều nay làm tí chó đi,
             vì mẹ em không có tiền nên mẹ em chỉ mua 1 cân một, thế là mẹ em cho vào luộc hoặc nấu rượu mận. Vậy là tối hôm đó, em và bố em rất thích”.

            Hãy cùng điểm qua những bài văn học sinh từng khiến cô giáo "cạn lời" và cộng đồng mạng cười ngả nghiêng, được lan truyền từ năm này
             qua năm khác:',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],
            ['id_category'=>4, 
            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'Em có mối tình đầu và cũng là mối tình sâu nặng nhất ở năm cuối cấp 3. Anh ấy là người sống rất đơn giản, không mưu cầu cuộc sống giàu có.
             Mọi chuyện đều ổn cho đến khi em ra trường và bắt đầu đi làm. Cuộc sống phải bon chen, nỗi lo cơm áo gạo tiền khiến em phải thay đổi suy nghĩ. 

            Bọn em bắt đầu cãi nhau, em có người mới khi cảm thấy cả hai sẽ không có tương lai khi ở bên cạnh nhau. Em cần nhiều hơn một người chỉ biết đến em,
             chỉ cần cuộc sống vui vẻ là được.
            
            Em bắt đầu cuộc sống hôn nhân với sếp của một người bạn. Nhà anh ấy rất có điều kiện, vì là con một nên bọn em sống cùng bố mẹ chồng luôn. 
            Thời gian yêu và tìm hiểu quá ngắn nên ngày về làm dâu em mới "vỡ" ra nhiều thứ.',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],]
        );
        
    }
}
