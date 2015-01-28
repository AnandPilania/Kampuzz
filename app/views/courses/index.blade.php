@extends('layouts.main')
<?php if ($course_name)
{
    $breadcrumb_t = $course_name->course_name;

    $specialization_filter = $course_name->hasSpecialization->toArray() ;
} 
   
?>

@section('content')

    <div class="row">
        <div class="col-md-9 ">
            <div class="rich_editor_text"></div>
            <div class="element_size_100">

                <header class="cs-heading-title">
                    <h2 class="cs-section-title float-left">View Courses</h2>
                </header>
                <div class="event eventlisting">

                    <?php
                    for ($i = 0; $i < count($collegeList);$i++){
                    $detail_url = route('courses.detail', ['slug' => Str::slug($collegeList[$i]['college_name'] . '-' . $collegeList[$i]['course_name']), 'id' => $collegeList[$i]['course_id']]);
                    ?>

                    <article class="events type-events status-publish has-post-thumbnail hentry">
                        <figure>
                            <img src="<?php if ($collegeList[$i]['college_logo'] <> '')
                            {
                                echo $collegeList[$i]['college_logo'];
                            } else
                            {
                                echo asset('images/no-thumb.png');
                            }?>" width="78px" alt="<?php echo $collegeList[$i]['college_name']; ?>"
                                 title="<?php echo $collegeList[$i]['college_name']; ?>">

                        </figure>
                        <div class="text">
                            <div class="event-texttop">
                                <h2 class="cs-post-title">
                                    <a href="<?php echo $detail_url; ?>"
                                       class="colrhvr"><?php echo $collegeList[$i]['college_name']; ?></a>
                                </h2>
                                <h6><?php echo $collegeList[$i]['city_name']; ?>
                                </h6>
                                <ul class="post-categories">
                                    <li><a href="<?php echo $detail_url; ?>"
                                           rel="tag"><?php echo $collegeList[$i]['course_name']; ?></a></li>
                                    <li>
                                        <time><?php  echo General::giveStars($collegeList[$i]['college_rating']);?></time>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-options">
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i><strong>Duration:</strong><span> <?php if ($collegeList[$i]['duration'] <> '')
                                            {
                                                echo $collegeList[$i]['duration'];
                                            } else if ($collegeList[$i]['course_duration'] <> '')
                                            {
                                                echo $collegeList[$i]['course_duration'];
                                            }?></span></li>

                                    <?php if ($collegeList[$i]['exam_required'] <> '')
                                    {
                                        echo '<li><i class="fa fa-qrcode"></i><strong>Exam:</strong> <span>' . substr($collegeList[$i]['exam_required'], 0, 100) . ' </span></li>';
                                    } ?>
                                    <?php if ($collegeList[$i]['total_fee'] <> '')
                                    {
                                        echo '<li><i class="fa fa-money"></i><strong>Fee:</strong> <span><i class="fa fa-inr"></i>' . $collegeList[$i]['total_fee'] . ' </span></li>';
                                    } ?>
                                    <?php if ($collegeList[$i]['affiliation'] <> '')
                                    {
                                        echo '<li><i class="fa fa-paperclip"></i><strong>Affiliation:</strong> <span>' . strip_tags($collegeList[$i]['affiliation']) . ' </span></li>';
                                    } ?>


                                </ul>
                            </div>
                            <a href="<?php echo $detail_url; ?>" class="btn cs-bgcolr bgcolr view">Details</a>

                        </div>


                    </article>


                    <?php } ?>


                </div>
                {{ $courseColleges->links() }}


            </div>
        </div>

        <div class="col-md-3 col-sm-4">

            

             @include('includes.widget_right_bar')

           
        </div>

    </div>
    <!-- Row End -->


@stop