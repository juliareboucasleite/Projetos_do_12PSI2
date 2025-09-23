namespace Escola
{
    partial class Form1
    {
        /// <summary>
        /// Variável de designer necessária.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpar os recursos que estão sendo usados.
        /// </summary>
        /// <param name="disposing">true se for necessário descartar os recursos gerenciados; caso contrário, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código gerado pelo Windows Form Designer

        /// <summary>
        /// Método necessário para suporte ao Designer - não modifique 
        /// o conteúdo deste método com o editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.ListaAlunos = new System.Windows.Forms.ListView();
            this.NumeroRegistos = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.DataNascimento = new System.Windows.Forms.DateTimePicker();
            this.Email = new System.Windows.Forms.TextBox();
            this.Morada = new System.Windows.Forms.TextBox();
            this.CodigoPostal = new System.Windows.Forms.TextBox();
            this.Nome = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.IdAlunos = new System.Windows.Forms.Label();
            this.NumeroProcesso = new System.Windows.Forms.Label();
            this.NumeroAluno = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.label8 = new System.Windows.Forms.Label();
            this.label9 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // ListaAlunos
            // 
            this.ListaAlunos.HideSelection = false;
            this.ListaAlunos.Location = new System.Drawing.Point(12, 57);
            this.ListaAlunos.Name = "ListaAlunos";
            this.ListaAlunos.Size = new System.Drawing.Size(353, 262);
            this.ListaAlunos.TabIndex = 1;
            this.ListaAlunos.UseCompatibleStateImageBehavior = false;
            this.ListaAlunos.SelectedIndexChanged += new System.EventHandler(this.ListaAlunos_SelectedIndexChanged);
            // 
            // NumeroRegistos
            // 
            this.NumeroRegistos.AutoSize = true;
            this.NumeroRegistos.Location = new System.Drawing.Point(14, 325);
            this.NumeroRegistos.Name = "NumeroRegistos";
            this.NumeroRegistos.Size = new System.Drawing.Size(38, 13);
            this.NumeroRegistos.TabIndex = 2;
            this.NumeroRegistos.Text = "label1";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Segoe UI", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.Location = new System.Drawing.Point(12, 9);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(159, 25);
            this.label2.TabIndex = 0;
            this.label2.Text = "Gestão da Escola";
            // 
            // DataNascimento
            // 
            this.DataNascimento.Location = new System.Drawing.Point(390, 316);
            this.DataNascimento.Name = "DataNascimento";
            this.DataNascimento.Size = new System.Drawing.Size(180, 22);
            this.DataNascimento.TabIndex = 18;
            this.DataNascimento.ValueChanged += new System.EventHandler(this.DataNascimento_ValueChanged);
            // 
            // Email
            // 
            this.Email.Location = new System.Drawing.Point(390, 267);
            this.Email.Name = "Email";
            this.Email.Size = new System.Drawing.Size(358, 22);
            this.Email.TabIndex = 16;
            // 
            // Morada
            // 
            this.Morada.Location = new System.Drawing.Point(391, 175);
            this.Morada.Multiline = true;
            this.Morada.Name = "Morada";
            this.Morada.Size = new System.Drawing.Size(248, 61);
            this.Morada.TabIndex = 12;
            // 
            // CodigoPostal
            // 
            this.CodigoPostal.Location = new System.Drawing.Point(666, 175);
            this.CodigoPostal.Name = "CodigoPostal";
            this.CodigoPostal.Size = new System.Drawing.Size(152, 22);
            this.CodigoPostal.TabIndex = 14;
            // 
            // Nome
            // 
            this.Nome.Location = new System.Drawing.Point(390, 109);
            this.Nome.Name = "Nome";
            this.Nome.Size = new System.Drawing.Size(428, 22);
            this.Nome.TabIndex = 10;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(390, 57);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(21, 13);
            this.label3.TabIndex = 3;
            this.label3.Text = "ID:";
            this.label3.Click += new System.EventHandler(this.label3_Click);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(479, 57);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(116, 13);
            this.label4.TabIndex = 5;
            this.label4.Text = "Número de processo:";
            this.label4.Click += new System.EventHandler(this.label4_Click);
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(663, 57);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(85, 13);
            this.label5.TabIndex = 7;
            this.label5.Text = "Número Aluno:";
            // 
            // IdAlunos
            // 
            this.IdAlunos.AutoSize = true;
            this.IdAlunos.Font = new System.Drawing.Font("Segoe UI", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.IdAlunos.Location = new System.Drawing.Point(417, 57);
            this.IdAlunos.Name = "IdAlunos";
            this.IdAlunos.Size = new System.Drawing.Size(38, 13);
            this.IdAlunos.TabIndex = 4;
            this.IdAlunos.Text = "label6";
            // 
            // NumeroProcesso
            // 
            this.NumeroProcesso.AutoSize = true;
            this.NumeroProcesso.Font = new System.Drawing.Font("Segoe UI", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.NumeroProcesso.Location = new System.Drawing.Point(601, 57);
            this.NumeroProcesso.Name = "NumeroProcesso";
            this.NumeroProcesso.Size = new System.Drawing.Size(38, 13);
            this.NumeroProcesso.TabIndex = 6;
            this.NumeroProcesso.Text = "label7";
            // 
            // NumeroAluno
            // 
            this.NumeroAluno.AutoSize = true;
            this.NumeroAluno.Font = new System.Drawing.Font("Segoe UI", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.NumeroAluno.Location = new System.Drawing.Point(754, 57);
            this.NumeroAluno.Name = "NumeroAluno";
            this.NumeroAluno.Size = new System.Drawing.Size(38, 13);
            this.NumeroAluno.TabIndex = 8;
            this.NumeroAluno.Text = "label8";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(390, 90);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(37, 13);
            this.label1.TabIndex = 9;
            this.label1.Text = "&Nome";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(390, 156);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(50, 13);
            this.label6.TabIndex = 11;
            this.label6.Text = "&Morada:";
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(663, 156);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(82, 13);
            this.label7.TabIndex = 13;
            this.label7.Text = "&Codigo Postal:";
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Location = new System.Drawing.Point(391, 248);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(37, 13);
            this.label8.TabIndex = 15;
            this.label8.Text = "&Email:";
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Location = new System.Drawing.Point(390, 300);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(113, 13);
            this.label9.TabIndex = 17;
            this.label9.Text = "&Data de Nascimento:";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(834, 393);
            this.Controls.Add(this.label9);
            this.Controls.Add(this.label8);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.NumeroAluno);
            this.Controls.Add(this.NumeroProcesso);
            this.Controls.Add(this.IdAlunos);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.Nome);
            this.Controls.Add(this.CodigoPostal);
            this.Controls.Add(this.Morada);
            this.Controls.Add(this.Email);
            this.Controls.Add(this.DataNascimento);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.NumeroRegistos);
            this.Controls.Add(this.ListaAlunos);
            this.Font = new System.Drawing.Font("Segoe UI", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Name = "Form1";
            this.Text = "Form1";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ListView ListaAlunos;
        private System.Windows.Forms.Label NumeroRegistos;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.DateTimePicker DataNascimento;
        private System.Windows.Forms.TextBox Email;
        private System.Windows.Forms.TextBox Morada;
        private System.Windows.Forms.TextBox CodigoPostal;
        private System.Windows.Forms.TextBox Nome;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label IdAlunos;
        private System.Windows.Forms.Label NumeroProcesso;
        private System.Windows.Forms.Label NumeroAluno;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label label9;
    }
}

