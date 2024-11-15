@extends('mainHome.customer.cover')
@section('content')
<style type="text/css">
	.container {
    max-width: 900px;
    margin: 0 auto;
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.title {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

.date {
    font-size: 16px;
    margin-bottom: 20px;
    text-align: center;
}

.section {
    margin-bottom: 20px;
}

.subtitle {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

ul {
    margin-left: 20px;
}

ul li {
    font-size: 16px;
    margin-bottom: 5px;
}

p {
    font-size: 16px;
    margin-bottom: 10px;
}

strong {
    font-weight: bold;
}

.signature-block {
    margin-top: 20px;
}

.signature-block p {
    font-size: 16px;
    margin-bottom: 10px;
}

.signatures {
    margin-top: 40px;
}

@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    .title {
        font-size: 20px;
    }

    .subtitle {
        font-size: 16px;
    }

    p, ul li {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .title {
        font-size: 18px;
    }

    .subtitle {
        font-size: 14px;
    }

    p, ul li {
        font-size: 12px;
    }
}
</style>

<div class="pagetitle">
    <h1>Contract</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Contract format</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

	<div class="container">
        <h1 class="title">Contract Agreement for SchoolEdge System Usage</h1>
        <p class="date">This Agreement is made on the _ _ _ _ day of _ _ _ _ _ _, 20_ _, between SchoolEdge<!--, a technology company ("Provider"),--> and <strong> _ _ _ </strong> ("School").</p>

        <section class="section">
            <h2 class="subtitle">1. Scope of Services</h2>
            <!-- <p>The Provider agrees to provide the SchoolEdge system for use by __________ (School/Customer) to facilitate school management, including student information management, performance tracking, payment collection, and communication.</p> -->

           	<p>The Provider agrees to grant _ _ _ _ _ _ _(School) access to the SchoolEdge system, a comprehensive platform designed to streamline school management tasks. This includes managing student information, tracking academic performance, facilitating communication between school staff and parents, and supporting staff management. The system offers centralized tools for handling student records, monitoring progress, generating reports, and improving overall communication within the school.</p>

			<p>SchoolEdge also utilizes machine learning to identify at-risk students, providing early intervention to prevent dropout or academic decline. By analyzing patterns in student data, the system can predict potential issues and suggest proactive solutions. This feature aims to enhance operational efficiency, reduce manual tasks, and improve the experience for both school management and staff. The Provider will ensure regular updates and provide ongoing support to guarantee the system functions effectively for the School.</p>

        </section>

        <section class="section">
            <h2 class="subtitle">2. System Features</h2>
            <ul>
				           
				<li>Student Information Management</li>
				<li>Performance Analytics and Tracking</li>
				<li>School Employee Management (teacher,librarian,accountant,etc...)</li>
				<li>Communication Platform</li>
				<!-- <li>Library & Resource Management</li> -->
				<li>Examination & Grading Automation</li>
				<li>Tracking Students at Risk of Falling Behind or Dropping Out</li>

            </ul>
        </section>

        <section class="section">
            <h2 class="subtitle">3. Payment Terms</h2>
            <p>The School agrees to a _ _ _ _ _ _  payment plan (termly/yearly).</p>
            <p><strong>Pricing:</strong> The cost is set at _ _ _ _ _ _ _ _ per student.</p>
            <p><strong>Student Range:</strong> This contract covers a range of _ _ _ _ _ _ students.</p>
            <p>Payment must be made via the approved method specified by the Provider on or before the due date.</p>
        </section>

        <section class="section">
            <h2 class="subtitle">4. Responsibilities of the School</h2>
            <ul>
                <li>Provide accurate and up-to-date student data for the system , 24/7.</li>
                <li>Ensure all staff members using SchoolEdge understand its usage policies and procedures.</li>
                <li>Inform Provider of any technical issues or system errors as soon as they arise.</li>
            </ul>
        </section>

        <section class="section">
            <h2 class="subtitle">5. Data Security & Privacy</h2>
            <p>The Provider ensures that all student and school data within SchoolEdge is securely stored and protected in compliance with data privacy regulations. Provider will not share or sell any School data to third parties without explicit written permission.</p>
        </section>

        <section class="section">
            <h2 class="subtitle">6. Support & Maintenance</h2>
            <p>The Provider will offer technical support to the School as per the support plan. Any necessary updates to the SchoolEdge system will be communicated and implemented with minimal disruption to the School's activities.</p>
        </section>

        <section class="section">
            <h2 class="subtitle">7. Termination</h2>
            <p>This contract may be terminated by either party with a _ _ _ _ _ _ (e.g., 30-day) written notice. Upon termination, the School's access to SchoolEdge will be disabled, and all School data will be securely returned or deleted as per School’s preference.</p>
        </section>

        <div class="signatures">
            <h3>Signed on this _ _ _ _ day of _ _ _ _ _ _, 20 _ _.</h3>
            <div class="signature-block">
                <p><strong>For SchoolEdge</strong></p>
                <p>Signature & date: _ _ _ _ _ _ _ _ _ </p>
                <p>Name: _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                <p>Title: _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
            </div>
            <div class="signature-block">
                <p><strong>For _ _ _ _ _  _ _ _ _ _ (School)</strong></p>
                <p>Signature & date: _ _ _ _ _ _ _ _ _ _ _</p>
                <p>Name: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                <p>Title: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
            </div>
        </div>
    </div>

</section>
@endsection