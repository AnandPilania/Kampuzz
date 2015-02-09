@extends('layouts.main')
<?php if ($course_name)
{
    $breadcrumb_t = $course_name->course_name;
    $breadcrumb_p = 'Study in ' . $country;
    $specialization_filter = $course_name->hasSpecialization->toArray() ;
    $exam_filter = $course_name->hasExams->toArray() ;
} ?>

@section('content')
<div class="row">
    <div  id="content_left" class="col-md-9 ">
        @section('content_left')
        <div class="rich_editor_text"></div>
        <div class="element_size_100">
            <header class="cs-heading-title">
                <h2 class="cs-section-title float-left">View Courses</h2>
            </header>
            <div class="event eventlisting">
                <?php foreach($courses as $course){
                if($course->eligibility){$eligibility = $course->eligibility->toArray();}
                $detail_url = route('courses.abroad.detail', ['slug' => Str::slug($course->university_name . '-' . $course->course_name), 'id' => $course->course_id, 'country' => $course->country]);
                ?>
                <article class="events type-events status-publish has-post-thumbnail hentry">
                    <figure style="width:200px; float:right">
                        <img src="<?php if ($course->logo_url <> '')
                        {
                            echo $course->logo_url;
                        } else
                        {
                            echo array('images/no-thumb.png');
                        }?>" width="200px" alt="<?php echo $course->university_name; ?>"
                             title="<?php echo $course->university_name; ?>">
                    </figure>
                    <div class="text" style="margin:0px; margin-left:10px">
                        <div class="event-texttop">
                            <h2 class="cs-post-title">
                                <a href="<?php echo $detail_url; ?>"
                                   class="colrhvr"><?php echo $course->course_name; ?></a>
                            </h2>
                            <ul class="post-categories">
                                <li><a href="<?php echo $detail_url; ?>"
                                       rel="tag"><?php
                                        $str = array();
                                        $str[] = $course->university_name;
                                        $str[] = $course->city;
                                        $str[] = $course->region;
                                        $str[] = $course->country;
                                        echo General::commafy($str); ?></a></li>
                            </ul>
                        </div>
                        <div class="post-options">
                            <ul>
                                <?php if ($course->course_duration <> '')
                                {
                                    echo '<li style="width:auto"><i class="fa fa-clock-o"></i><strong>Duration:</strong><span> ';
                                    echo $course->course_duration;
                                    echo '</span></li>';
                                } ?>
                                <?php if (isset($eligibility[0]['exam_name']))
                                {
                                    echo '<li style="width:auto"><i class="fa fa-qrcode"></i><strong>Exam:</strong> <span>' . substr($eligibility[0]['exam_name'], 0, 100) . ' - Cut Off: ' . $eligibility[0]['cut_off_marks'] . '</span></li>';
                                } ?>
                                <?php if ($course->fees_lakh_inr <> '')
                                {
                                    echo '<li style="width:auto"><i class="fa fa-money"></i><strong>1st Year Fee:</strong> <span><i class="fa fa-inr"></i>' . $course->fees_lakh_inr . ' Lacs</span></li>';
                                } ?>
                                <?php if ($course->affiliation <> '')
                                {
                                    echo '<li style="width:auto"><i class="fa fa-paperclip"></i><strong>Affiliation:</strong> <span>' . strip_tags($course->affiliation) . ' </span></li>';
                                } ?>
                            </ul>
                        </div>
                    </div>
                </article>
                <?php } ?>

            </div>
            {{ $courses->links() }}
        </div>
        @stop
        @yield('content_left')
    </div>
    <aside id="cotent_right" class="col-md-3">

            @include('includes.widget_right_bar_course_abroad')

            <!-- @include('includes.widget_abroad') -->
           
    </aside>
</div>

<script>



    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            $(".transparentCover").show();
            $(".loading").show();
            getFilteredList($(this).attr('href'),$(this).attr('href').split('page=')[1]); 
            
        });
    });

    function scrollToElement(ele) {
             $(window).scrollTop(ele.offset().top).scrollLeft(ele.offset().left);
    }

    function getFilteredList(url,page) {
        $.ajax({
            url : url ,
            type: "GET",
            beforeSend: function(xhr){
                            xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
                        },
        }).done(function (data) {
             $(".transparentCover").hide();
            $(".loading").hide();
            $('#content_left').html(data);
            location.hash = 'page='+page;
            scrollToElement($('#content_left'));
        }).fail(function () {
           // alert('Server Busy');
        });
    }

    </script>
@stop