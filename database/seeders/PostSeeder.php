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
            ['id_category'=>3, 
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
            ['id_category'=>4, 
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
            ['id_category'=>5, 
            'title'=>'NGÀY TÀN CỦA COVID-19 SẮP ĐẾN???',
            'Content'=>'Các nhà khoa học của Trường Đại học Y Pittsburgh (Mỹ) đã phân lập được phân tử sinh học nhỏ nhất cho đến nay có thể vô hiệu hóa hoàn toàn và rõ rệt virus SARS-CoV-2 gây bệnh COVID-19.

            Loại kháng thể "nhỏ mà có võ" được các nhà khoa học Mỹ phát hiện làm dấy lên hi vọng trong bối cảnh chưa có vắc xin hiệu quả và an toàn tiêm chủng đại trà
            
            Thành phần kháng thể này có kích thước nhỏ hơn kháng thể thông thường gấp 10 lần và đã được sử dụng để tạo ra một loại thuốc có tên Ab8. Các nhà khoa học kỳ vọng loại thuốc được bào chế từ kháng thể "nhỏ mà có võ" này sẽ sớm được sử dụng như một liệu pháp phòng chống SARS-CoV-2.
            
            Nhóm nghiên cứu nhận thấy những con chuột được cho sử dụng Ab8 ở nhiều mức độ khác nhau có nguy cơ nhiễm SARS-CoV-2 thấp hơn những con không dùng. Nghiên cứu sâu hơn, các nhà khoa học cho biết khi dùng Abe48 nồng độ thấp, virus bị chặn đứng và không thể xâm nhập tế bào của chuột, giúp chúng không bị nhiễm bệnh
            
            Kích thước siêu nhỏ của kháng thể không chỉ làm tăng khả năng khuếch tán trong các mô để vô hiệu hóa virus tốt hơn, mà còn cho phép các nhà khoa học tính đến khả năng sử dụng thuốc bằng nhiều cách như hít qua mũi hoặc chích dưới da.
            
            Quan trọng hơn, loại thuốc này không liên kết với các tế bào của con người - một dấu hiệu tốt cho thấy nó sẽ không có tác dụng phụ tiêu cực.
            
            Các nước trên thế giới đang cố gắng về đích trong cuộc chiến chống lại Covid-19 rồi, cố lên mọi người!!!!
            
            Theo: Báo Tuổi Trẻ, Báo Lao động',
            'published'=>1,
            'published_at'=>new DateTime(),
            ],]
        );
    }
}
