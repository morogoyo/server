package com.example.tipcalculator;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.SeekBar;
import android.widget.SeekBar.OnSeekBarChangeListener;

public class MainActivity extends Activity implements OnClickListener {

	// Declaration of all elements

	EditText bill;
	EditText percent;
	EditText total;
	Button calculate;
	SeekBar sk;
	double b;
	double p;
	double t;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);

		bill = (EditText) findViewById(R.id.billTextview);
		percent = (EditText) findViewById(R.id.percentTextView);
		total = (EditText) findViewById(R.id.totalTextView);
		calculate = (Button) findViewById(R.id.calculate);
		sk = (SeekBar) findViewById(R.id.seekBar1);

		calculate.setOnClickListener(new View.OnClickListener() {

			public void onClick(View v) {

				// variable = makeIt int ot a double (edit box
				// getText().toString())
				// b= Double.parseDouble(bill.getText().toString());
				b = Double.parseDouble(bill.getText().toString());
				p = Double.parseDouble(percent.getText().toString());

				t = b * 1 + (p / 100);

				total.setText(String.format("%.02f", t));

			}
		});

		// working with the seek bar

		sk.setOnSeekBarChangeListener(new OnSeekBarChangeListener() {
			public void onProgressChanged(SeekBar seekBar, int progress,
					boolean fromUser) {
				// TODO Auto-generated method stub
				percent.setText(String.format("%.02f", progress).toString());
			}

			public void onStartTrackingTouch(SeekBar seekBar) {
				// TODO Auto-generated method stub
			}

			public void onStopTrackingTouch(SeekBar seekBar) {
				// TODO Auto-generated method stub
			}
		});

	}

	

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public void onClick(View v) {
		// TODO Auto-generated method stub

	}

}
